<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APark</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<div class="back_page">
    <a href="{{ route('home')}}" class="return_home">ホームへ戻る</a>
</div>

<div class="inner">

    <h1>マイページ</h1>

    <div class="my_page_items">

    <div class="why_engineer">
    <h2>Why engineer：なぜエンジニアになりたいのか？</h2>

    <div class="why_engineer_edit">
        <form id="whyEngineerForm" action="{{ route('why.engineer') }}" method="POST">
            @csrf
            <textarea id="whyEngineerTextarea" name="why_engineer" rows="4" cols="50" disabled>{{ Auth::user()->why_engineer }}</textarea>
            <br>
            <button type="button" id="saveButton" style="display:none;">保存する</button>
        </form>
    </div>

    <button id="editButton">編集する</button>
    {{-- <div id="alertMessage" style="display:none; color: green;">Why engineerが更新されました。</div> --}}

</div>


<div class="my_ideas">
    <h2>自分のアイデア</h2>
    <div class="my-ideas-items">
        @if ($ideas->isEmpty())
            <p>アイデアがありません。</p>
        @else
            <ul>
                @foreach($ideas as $index => $idea)
                    @foreach($idea->feedbacks as $feedback)
                    <li class="idea-item"
                        data-idea-id="{{ $idea->id }}"
                        data-elevator1="{{ $idea->elevator1 }}"
                        data-elevator2="{{ $idea->elevator2 }}"
                        data-how="{{ $idea->how }}"
                        data-self-chart1="{{ $idea->self_chart1 }}"
                        data-self-chart2="{{ $idea->self_chart2 }}"
                        data-self-chart3="{{ $idea->self_chart3 }}"
                        data-self-chart4="{{ $idea->self_chart4 }}"
                        data-self-chart5="{{ $idea->self_chart5 }}"
                        data-fb-chart1="{{ $feedback->fb_chart1 }}"
                        data-fb-chart2="{{ $feedback->fb_chart2 }}"
                        data-fb-chart3="{{ $feedback->fb_chart3 }}"
                        data-fb-chart4="{{ $feedback->fb_chart4 }}"
                        data-fb-chart5="{{ $feedback->fb_chart5 }}">
                    @endforeach
                        <span class="theme">
                            @switch($idea->theme)
                                @case(1)
                                    「自分たちの役に立つものを開発せよ」
                                    @break
                                @case(2)
                                    「ワクワクするものを開発せよ」
                                    @break
                                @case(3)
                                    オリジナルプロダクト
                                    @break
                            @endswitch
                        </span>
                        <br>
                        <span>エレベーターピッチ:</span><br>
                        <p class="txt-limit">{{ $idea->elevator1 }}<br>{{ $idea->elevator2 }}</p><br>
                        <span>解決方法:</span><br>
                        <p class="txt-limit">{{ $idea->how }}</p><br>
                        <span>{{ $idea->created_at }}</span><br>

                        <!-- @if ($idea->feedbacks->isNotEmpty())
                            <h3>フィードバック</h3>
                            <ul>
                                @foreach($idea->feedbacks as $feedback)
                                    <li>
                                        <p>フィードバックコメント: {{ $feedback->comment1 }}</p>
                                        <p>fb_chart1: {{ $feedback->fb_chart1 }}</p>
                                        <p>fb_chart2: {{ $feedback->fb_chart2 }}</p>
                                        <p>fb_chart3: {{ $feedback->fb_chart3 }}</p>
                                        <p>fb_chart4: {{ $feedback->fb_chart4 }}</p>
                                        <p>fb_chart5: {{ $feedback->fb_chart5 }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>フィードバックがありません。</p>
                        @endif -->
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>


<!-- モーダルエリアここから -->

<section id="modalArea" class="modalArea" style="display:none;">
    <div id="modalBg" class="modalBg"></div>
    <div class="modalWrapper">
        <div class="modalContents">
            <p><strong>テーマ:</strong> <span id="modalTheme"></span></p>
            <p><strong>エレベーターピッチ:</strong><br>
                <span id="modalElevator1"></span><br>
                <span id="modalElevator2"></span>
            </p>
            <p><strong>解決方法:</strong><br>
                <span id="modalHow"></span>
            </p>
            <p><strong>作成日時:</strong> <span id="modalCreatedAt"></span></p>

            <canvas id="feedBackRadarChart"></canvas>

            <form id="deleteForm" method="POST" action="{{ route('ideas.myPage.delete') }}">
                @csrf
                <input type="hidden" name="idea_id" id="modalIdeaId" value="">
                <button type="button" id="delete_button_open">アイデアを削除する</button>
            </form>
        </div>
        <div id="closeModal" class="closeModal">×</div>
    </div>
</section>
<!-- モーダルエリアここまで -->


        </div>

    </div>

</div>

<script src="{{ asset('js/my_page.js') }}"></script>
</body>

</html>
