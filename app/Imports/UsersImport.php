<?php

namespace App\Imports;

use App\Enums\Status;
use App\Models\Bank;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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

        if ($action === Status::DISABLED->value || $action === Status::ACTIVATED->value) {
            User::whereIn('hr_id', $rows->pluck('hr_id')->toArray())->update([
                'status' => $action
            ]);
            return;
        }

        foreach ($rows as $row) {
            $user = User::updateOrCreate([
                'hr_id' => $row['hr_id'],
            ], [
                'email' => $row['email'],
                'password' => rand(111111111111111, 999999999999999),
                'phone' => $row['phone'],
                'status' => 'activated',
                'group' => Str::slug($row['group']),
                'en' => [
                    'name' => $row['name_en'],
                ],
                'ar' => [
                    'name' => $row['name_ar'],
                ]
            ]);

            if (Role::where('name', $row['role'])->exists()) {
                $user->assignRole($row['role']);
            } else {
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
            'hr_id' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'password' => ['nullable'],
            'status' => ['nullable', Rule::in(Status::cases())],
            'role' => ['required', Rule::exists('roles', 'name')],
            'group' => ['required', 'string'],
            'bank_ids' => ['required'],
        ];
    }
}
