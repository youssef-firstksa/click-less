<?php

namespace App\Livewire\Agent;

use App\Models\Article;
use App\Services\AiService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchFeature extends Component
{
    public $currentRoute;
    public string $errorMessage;
    public string $aiResponse;
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
        $this->currentRoute = request()->route()->getName();

        $this->searchTitle = __('agent.general.how_can_we_help_you');
        $this->searchPlaceholder = __('agent.general.search_for_an_article');

        $this->liveSearchArticles = new Collection();
    }

    public function render()
    {
        return view('livewire.agent.search-feature');
    }

    public function submit()
    {
        return match ($this->searchType) {
            'normal' => $this->normalSearch(),
            'ai_offline' => $this->aiOfflineSearch(),
            'ai_online' => $this->aiOnlineSearch(),
        };
    }

    public function setSearchType(string $type)
    {
        $this->search = '';

        $this->searchTitle = match ($type) {
            'normal' => __('agent.general.how_can_we_help_you'),
            'ai_offline' => __('agent.general.ai_search_offline'),
            'ai_online' => __('agent.general.ai_search_online'),
            default => __('agent.general.how_can_we_help_you'),
        };

        $this->searchPlaceholder = match ($type) {
            'normal' => __('agent.general.search_for_an_article'),
            'ai_offline' => __('agent.general.ai_search_offline'),
            'ai_online' => __('agent.general.ai_search_online'),
            default => __('agent.general.search_for_an_article'),
        };

        if ($this->liveSearchArticles->count() > 0) {
            $this->liveSearchArticles = new Collection();
        }

        $this->reset('errorMessage', 'aiResponse');

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

        $this->reset('errorMessage');
    }

    private function normalSearch()
    {
        return redirect()->route('agent.articles.index', [
            'search' => $this->search,
            'section_id' => request()->get('section_id'),
        ]);
    }

    private function aiOfflineSearch()
    {
        if ($this->search === '' || $this->searchType !== 'ai_offline') {

            if ($this->liveSearchArticles->count() > 0) {
                $this->liveSearchArticles = new Collection();
            }

            $this->reset('errorMessage', 'aiResponse');

            return;
        }

        $articles = DB::table('articles')
            ->where('bank_id', auth()->user()->activeBank()->id)
            ->join('article_translations', function ($query) {
                $query->on('articles.id', '=', 'article_translations.article_id');
            })
            ->whereFullText(['title', 'content'], $this->search)
            ->latest()
            ->limit(5)
            ->get();

        if ($articles->count() == 0) {
            $this->errorMessage = 'لا يوجد نتائج';
            return;
        }

        $context = '';
        foreach ($articles as $article) {
            $context .= ' | ' . strip_tags($article->content);
        }

        $aiService = new AiService();
        $response = $aiService->search($this->search, $context);

        if (!$response['success']) {
            $this->errorMessage = $response['message'];
            return;
        }

        $this->aiResponse = $response['message'];
        $this->reset('errorMessage');
    }

    private function aiOnlineSearch()
    {
        $aiKey = auth()->user()->activeBank()->ai_key;

        $aiService = new AiService();
        $response = $aiService->interactiveSearch($this->search, $aiKey);

        if (!$response['success']) {
            $this->errorMessage = $response['message'];
            $this->reset('aiResponse');
            return;
        }

        $this->aiResponse = $response['message'];
        $this->reset('errorMessage');
    }
}
