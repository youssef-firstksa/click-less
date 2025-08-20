<?php

namespace App\Imports;

use App\Models\Bank;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $action = request()->input('action');

        if ($action === 'delete') {
            User::whereIn('hr_id', $rows->pluck('hr_id')->toArray())->delete();
            return;
        }

        if ($action === 'force_delete') {
            User::whereIn('hr_id', $rows->pluck('hr_id')->toArray())->forceDelete();
            return;
        }

        foreach ($rows as $row) {
            $user = User::updateOrCreate([
                'hr_id' => $row['hr_id'],
            ], [
                'email' => $row['email'],
                'en' => [
                    'name' => $row['name_en'],
                ],
                'ar' => [
                    'name' => $row['name_ar'],
                ]
            ]);

            if ($user->roles()->count() == 0) {
                $user->assignRole('agent');
            }

            $bankIds = explode(',', trim($row['bank_ids']));
            $bankIds = array_filter($bankIds, function ($id) {
                return Bank::where('id', $id)->exists();
            });

            $user->banks()->sync($bankIds);

            if (!$user->activeBank()) {
                $bank = $user->banks()->first();
                $user->banks()->updateExistingPivot($bank->id, ['active' => 1]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'hr_id' => [
                'required',
            ],
        ];
    }
}
