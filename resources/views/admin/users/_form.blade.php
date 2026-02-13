<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="name">名前</label>
  </div>
  <div class="inputItem">
    <input type="text" id="name" name="name" value="{{ old('name', $user?->name) }}" class="textInput" placeholder="例）山田太郎">
    @error('name')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="name_kana">フリガナ</label>
  </div>
  <div class="inputItem">
    <input type="text" id="name_kana" name="name_kana" value="{{ old('name_kana', $user?->name_kana) }}" class="textInput" placeholder="例）ヤマダタロウ">
    @error('name_kana')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="mail">メールアドレス</label>
  </div>
  <div class="inputItem">
    <input type="email" id="mail" name="mail" value="{{ old('mail', $user?->email) }}" class="textInput" placeholder="例）example@gmail.com">
    @error('mail')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="password">パスワード</label>
  </div>
  <div class="inputItem">
    <input type="password" id="password" name="password" value="{{ old('password') }}" class="textInput" placeholder="Password">
    @error('password')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="phone">電話番号</label>
  </div>
  <div class="inputItem">
    <input type="tel" id="phone" name="phone" value="{{ old('phone', $user?->phone) }}" class="textInput" placeholder="例）000-0000-0000">
    @error('phone')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="postcode">郵便番号</label>
  </div>
  <div class="inputItem">
    <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $user?->zipcode) }}" class="textInput" placeholder="例）0000000">
    @error('postcode')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="label" for="prefecture">都道府県</label>
  </div>
  <div class="inputItem">
    <select id="prefecture" name="prefecture" class="select">
      <option value="">選択してください</option>
      @foreach ($prefectures as $key => $prefecture)
      <option value="{{ $key }}" @selected(old('prefecture', $user?->prefecture) == $key) >{{$prefecture}}</option>
      @endforeach
    </select>
    @error('prefecture')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="city">市町村</label>
  </div>
  <div class="inputItem">
    <input type="text" id="city" name="city" value="{{ old('city', $user?->city) }}" class="textInput" placeholder="例）〇〇市〇〇区〇〇町">
    @error('city')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="" for="address_line1">番地・アパート名</label>
  </div>
  <div class="inputItem">
    <input type="text" id="address_line1" name="address_line1" value="{{ old('address_line1', $user?->zipcode) }}" class="textInput" placeholder="例）〇〇丁目〇〇-〇〇 〇〇アパート">
    @error('address_line1')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="contentItem">
  <div class="textItem">
    <span class="required">必須</span>
    <label class="label" for="memo">備考欄</label>
  </div>
  <div class="inputItem">
    <textarea id="memo" name="memo" class="memoText">{{ old('memo', $user?->remarks) }}</textarea>
    @error('memo')
    <span class="errorMessage">{{ $message }}</span>
    @enderror
  </div>
</div>