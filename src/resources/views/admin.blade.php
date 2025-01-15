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
                </select>
                <select class="search-form__item-category">
                <option value="">お問い合わせの種類</option>
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
        </table>

    </div>
    </form>
</div>
@endsection