    @extends('layouts.app')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @endsection



    @section('content')
<div class="admin__content">
    <div class="admin-form__heading">
        <h2>Admin</h2>
    </div>

    <form class="form" action="/admin" method="post">
        <div class="search__form">
            <div class="search__form-item">
                <input class="search-form__item-input" type="text" placeholder="名前やメールアドレスを入れてください"/>
                <select class="search-form__item-gender">
                <option value="">性別</option>
                <option value="all">全て</option>
                <option value="mele">男性</option>
                <option value="female">女性</option>
                <option value="other">その他</option>
                </select>
                
                <select class="search-form__item-category">
                    <option value="">お問い合わせの種類</option>
                    <option value="content">商品のお届けについて</option>
                    <option value="content">商品の交換について</option>
                    <option value="content">商品トラブル</option>
                    <option value="content">ショップへのお問い合わせ</option>
                    <option value="content">その他</option>
                </select>
                    <div  class="search-form__item-date">
                    <input type="date" name="date" placeholder="年/月/日"/>
                    </div>
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
                <button class="search-form__button-reset" type="reset">リセット</button>
                <button class="search-form__button-export"
                type="button">エクスポート</button>
            </div>
        </div>
        </div>
    </form>
    {{ $contacts->links()}}

    <div class="user-table">
        <table class="user-table__inner">
            <tr class="user-table__row">
                <th class="user-table__heder">
                    <span class="user-table__header-span">お名前</span>
                    <span class="user-table__header-span">性別</span>
                    <span class="user-table__header-span">メールアドレス</span>
                    <span class="user-table__header-span">お問い合わせの種類</span>
                </th>
            </tr>
            @foreach( $contacts as $contact )
            <tr>
                <td>{{ $contact->first_name }}</td>
                <td>{{ $contact->last_name }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category_content}}</td>
            </tr>
            @endforeach
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="detailModal">詳細</button>
        </table>

    </div>

</div>
@endsection