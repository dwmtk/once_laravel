@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規作成<a class="btn btn-sm btn-outline-secondary float-right" href="{{ url('manage/index') }}">戻る</a></div>
                @include('layouts.alert')
                <div class="card-body">
                    <form method="POST" action="{{ url('manage/insert') }}" class="col-md-12" enctype="multipart/form-data" onSubmit="return dialog('イベントを新規作成しますか？')">
                    @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-3 col-form-label">イベント名</label>
                            <input id="name" type="text" class="col-md-12 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-md-3 col-form-label">カテゴリ</label>
                            <select id="category" class="col-md-12 form-control @error('category') is-invalid @enderror" type="text" name="category" value="{{ old('category') }}" required>
                                <option value="" selected>選択してください</option>
                                @foreach (config('categorys') as $key => $category)
                                <option value="{{ $key }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-md-3 col-form-label">内容（HTMLコードの記述も可能）</label>
                            <textarea id="content" class="col-md-12 form-control @error('content') is-invalid @enderror" name="content" style="height:600px;" required>{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="capacity" class="col-md-3 col-form-label">定員</label>
                            <input id="capacity" class="col-md-3 form-control @error('capacity') is-invalid @enderror" type="text" name="capacity" value="{{ old('capacity') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-form-label">開催期間</label>
                            <div class="form-inline">
                                <input id="start_y" class="col-3 form-control form-control-sm @error('start_y') is-invalid @enderror" type="text" name="start_y" value="{{  old('start_y') }}" placeholder="2020" required><label for="start_y" class="col-form-label mx-1">年</label>
                                <input id="start_m" class="col-2 form-control form-control-sm @error('start_m') is-invalid @enderror" type="text" name="start_m" value="{{ old('start_m') }}" placeholder="11" required><label for="start_m" class="col-form-label mx-1">月</label>
                                <input id="start_d" class="col-2 form-control form-control-sm @error('start_d') is-invalid @enderror" type="text" name="start_d" value="{{ old('start_d') }}" placeholder="11" required><label for="start_d" class="col-form-label mx-1">日</label>
                            </div>
                            <div class="form-inline">
                                <input id="start_hour" class="col-2 form-control form-control-sm @error('start_hour') is-invalid @enderror" type="text" name="start_hour" value="{{ old('start_hour') }}" placeholder="12" required><label for="start_hour" class="col-form-label mx-1">時</label>
                                <input id="start_min" class="col-2 form-control form-control-sm @error('start_min') is-invalid @enderror" type="text" name="start_min" value="{{ old('start_min') }}" placeholder="30" required><label for="start_min" class="col-form-label mx-1">分</label>
                            </div>
                            　～　
                            <div class="form-inline">
                                <input id="end_y" class="col-3 form-control form-control-sm @error('end_y') is-invalid @enderror" type="text" name="end_y" value="{{ old('end_y') }}" required><label for="end_y" class="col-form-label mx-1">年</label>
                                <input id="end_m" class="col-2 form-control form-control-sm @error('end_m') is-invalid @enderror" type="text" name="end_m" value="{{ old('end_m') }}" required><label for="end_m" class="col-form-label mx-1">月</label>
                                <input id="end_d" class="col-2 form-control form-control-sm @error('end_d') is-invalid @enderror" type="text" name="end_d" value="{{ old('end_d') }}" required><label for="end_d" class="col-form-label mx-1">日</label>
                            </div>
                            <div class="form-inline">
                                <input id="end_hour" class="col-2 form-control form-control-sm @error('end_hour') is-invalid @enderror" type="text" name="end_hour" value="{{ old('end_hour') }}" required><label for="end_hour" class="col-form-label mx-1">時</label>
                                <input id="end_min" class="col-2 form-control form-control-sm @error('end_min') is-invalid @enderror" type="text" name="end_min" value="{{ old('end_min') }}" required><label for="end_min" class="col-form-label mx-1">分</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image1" class="col-md-3 col-form-label">画像 ※1枚のみ</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="image1" name="image1" class="custom-file-input">
                                    <label class="custom-file-label" for="image1" data-browse="参照">ファイルを選択</label>
                                </div>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary input-group-text reset">取消</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary " value="イベントを新規作成">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
