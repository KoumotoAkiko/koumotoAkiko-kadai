<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
 <header class="header">
    <div class="header__inner">
        Contact Form
      </a>
    </div>
  </header>

  <main>
    <div class="contact-form__content">
     <div class="contact-form__heading">
      <h2>お問い合わせ</h2>
</div>
<form class="form" action="/contacts/confirm" method="post">
    @csrf
 <div class="form__group">
  <div class="form__group-title">
   <span class="form__label--item">お名前</span>
   <span class="form__label--required">※</span>
  </div>
  <div class="form__group-content">
    <div class="form__input--text">
      <input type="text" name="name" placeholder="(例）山田"  value="{{ old('name') }}"/>
    <div class="form__input--text"> 
     <input type="text" name="name" placeholder="（例）太郎" value="{{ old('name') }}"/>
    </div>
    <div class="form__error">
    @error('name')
    {{ $message }}
    @enderror
    </div>

    <form class="form__group">
     <div class="form__group-title">
      <span class="form__label--item">性別</span>
      <span class="form__label--required">※</span>
    </div>
    <div class="form__group-radio">
     <input type="radio" name="gender" value="男" checked>男
     <input type="radio" name="gender" value="女">女
     <input type="radio" name="gender" value="その他">その他
    </div>
    <div class="form__error">
    @error('gender')
    {{ $message }}
    @enderror
    </div>

    <div class="form__group">
     <div class="form__group-title">
       <span class="form__label--item">メールアドレス</span>
       <span class="form__label--required">※</span>
     </div>
     <div class="form__group-content">
      <div class="form__input--text">
        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}"/>
      </div>
      <div class="form__error">
      @error('email')
     {{ $message }}
     @enderror
      </div>
    </div>
    <div class="form__group">
     <div class="form__group-title">
      <span class="form__label--item">電話番号</span>
      <span class="form__label--required">※</span>
    </div>
    <div class="form__group-content">
     <div class="form__input--text">
       <input type="tel" name="tel" placeholder="080" value="{{ old('tel') }}"/> -
       <input type="tel" name="tel" placeholder="1234" value="{{ old('tel') }}"/> -
        <input type="tel" name="tel" placeholder="5678" value="{{ old('tel') }}"/>
     </div>  
     <div class="form__error">
    @error('tel')
    {{ $message }}
    @enderror
    </div>
   </div>
</div>

<div class="form__group">
 <div class="form__group-title">
  <span class="form__label--item">住所</span>
  <span class="form__label--required">※</span>
 </div>
</div>
<div class="form__group-content">
 <div class="form__input--text">
    <input type="address" name="address" placeholder="(例)東京都渋谷区千駄ヶ谷1-2-3 " value="{{ old('address') }}"/>
 </div>
</div>
<div class="form__error">
@error('address')
{{ $message }}
@enderror
</div>
</div>

<div class="form__group">
  <div class="form__group-title">
    <span class="form__label--item">建物名</span>
  </div>
  <div class="form__group-content">
    <div class="form__input--text">
      <input type="building" name="building" placeholder="(例)千駄ヶ谷マンション101" value="{{ old('building') }}"/>
    </div>
  </div>
</div>

<div class="form__group">
  <div class="form__group-title">
    <span class="form__label--item">お問い合わせの種類</span>
    <span class="form__label--required">※</span>
  </div>
  <div class="form__group-content">
    <div class="form__input-select">
     <select name="category">
      <option value="選択してください">選択してください</option>
     </select>
     <div class="form__error">
     @error('category')
     {{ $message }}
     @enderror
     </div>
    </div>
  </div>
</div>

<div class="form__group">
  <div class="form__group-title">
    <span class="form__label--item">お問い合わせ内容
    </span>
    <span class="form__label--required">※</span>
  </div>
  <div class="form__group-content">
    <div class="form__input--textarea">
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
    </div>
    <div class="form__error">
     @error('detail')
     {{ $message }}
     @enderror
    </div>
  </div>
</div>

<div class="form__button">
    <button class="form__button-submit" type="submit">確認画面</button>
</div>
</form>
</div>
  </main>

</body>
</html>