<?php

namespace App\Livewire\Agent;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchFeature extends Component
{
    public string $searchType = 'normal';
    public string $searchTitle;
    public string $searchPlaceholder = '';
    public string $search = '';
    public Collection $liveSearchArticles;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->searchTitle = __('agent.general.how_can_we_help_you');
        $this->searchPlaceholder = __('agent.general.search_for_an_article');
        $this->liveSearchArticles = new Collection();
    }

    public function render()
    {
        return view('livewire.agent.search-feature');
    }

    public function setSearchType(string $type)
    {
        $this->search = '';

        $this->searchTitle = match ($type) {
            'normal' => __('agent.general.how_can_we_help_you'),
            'ai_offline' => 'ai offline',
            'ai_online' => 'ai online',
            default => __('agent.general.how_can_we_help_you'),
        };

        $this->searchPlaceholder = match ($type) {
            'normal' => __('agent.general.search_for_an_article'),
            'ai_offline' => 'ai offline placeholder',
            'ai_online' => 'ai online placeholder',
            default => __('agent.general.search_for_an_article'),
        };

        if ($this->liveSearchArticles->count() > 0) {
            $this->liveSearchArticles = new Collection();
        }

        $this->searchType = $type;
    }

    public function liveSearch()
    {
        $this->search = trim($this->search);

        if ($this->search === '' || $this->searchType !== 'normal') {

            if ($this->liveSearchArticles->count() > 0) {
                $this->liveSearchArticles = new Collection();
            }

            return;
        }

        $this->liveSearchArticles = Article::select('id', 'section_id', 'published_at', 'created_at')
            ->whereCanAccess()
            ->whereTranslationLike('title', "%{$this->search}%")
            ->latest()
            ->limit(5)
            ->get();
    }

    public function submit()
    {
        return match ($this->searchType) {
            'normal' => $this->normalSearch(),
            'ai_offline' => $this->aiOfflineSearch(),
            'ai_online' => $this->aiOnlineSearch(),
        };
    }

    private function normalSearch()
    {
        return redirect()->route('agent.articles.index', [
            'search' => $this->search,
            'section_id' => request()->get('section_id'),
        ]);
    }
}
