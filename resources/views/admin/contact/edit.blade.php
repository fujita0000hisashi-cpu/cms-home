@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin.contact.edit') }}
<div class="contentsArea">
  <div class="contentsArea__header">
    <h2 class="contentsArea__header__title">{{$title}}</h2>
  </div>
  <div class="contentsArea__content">
    <section class="admin-contact">
      <form id="editForm" method="POST" action="{{ route('admin.contact.update', $inquiry->id) }}">
        @csrf
        @method('PUT')
        <div class="dataContentItem">
          <h3>ステータス</h3>
          <select id="status" name="status" class="select">
            <option value="未対応">未対応</option>
            <option value="対応中">対応中</option>
            <option value="完了">対応済</option>
          </select>
          <!-- @error('status')
            <span class="errorMessage">{{ $message }}</span>
            @enderror -->
        </div>
        <div class="dataContentItem">
          <h3>お問い合わせ内容</h3>
          <p class="dataContentItemP">{{ $contact['contact'] }}</p>
        </div>
        <div class="dataContentItem">
          <h3>備考欄</h3>
          <textarea id="memo" name="memo" class="textArea"></textarea>
          <!-- @error('memo')
            <span class="errorMessage">{{ $message }}</span>
            @enderror -->
        </div>
        <div>
          <h3>お問い合わせ情報</h3>
          <div class="dataContentItem">
            <p class="dataContentItemP">会社名:{{ $contact['company'] }}</p>
          </div>
          <div class="dataContentItem">
            <p class="dataContentItemP">氏名:{{ $contact['name'] }}</p>
          </div>
          <div class="dataContentItem">
            <p class="dataContentItemP">電話番号:{{ $contact['phone'] }}</p>
          </div>
          <div class="dataContentItem">
            <p class="dataContentItemP">メールアドレス:{{ $contact['mail'] }}</p>
          </div>
          <div class="dataContentItem">
            <p class="dataContentItemP">生年月日:{{ $contact['birthday'] }}</p>
          </div>
          <div class="dataContentItem">
            <p class="dataContentItemP">性別:{{ $contact['sex'] }}</p>
          </div>
          <div class="dataContentItem">
            <p class="dataContentItemP">職業:{{ $contact['job'] }}</p>
          </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="button" id="openConfirm" class="submitButton">登録する</button>
        <!-- <button type="button" class="submitButton" onclick="history.back()">戻る</button> -->
      </form>

      <dialog id="confirmModal">
        <div class="c-dialog__header">
          <h4 class="c-dialog__title">この内容でステータスを更新しますか？</h4>
          <button type="button" class="c-dialog__close" id="closeConfirm">×</button>
        </div>
        <div class="c-dialog__body">
          <div class="c-kv">
            <div class="c-kv__key">ステータス</div>
            <div class="c-kv__val" id="confirmStatus"></div>

            <div class="c-kv__key">備考欄</div>
            <div class="c-kv__val">
              <pre id="confirmMemo"></pre>
            </div>
          </div>
        </div>

        <div class="c-dialog__footer">
          <button type="button" class="c-btn" id="backConfirm">戻る</button>
          <button type="submit" form="editForm" class="c-btn c-btn--primary" id="submitConfirm">登録</button>
        </div>
      </dialog>
      <script>
        const form = document.getElementById('editForm');
        const openBtn = document.getElementById('openConfirm');
        const modal = document.getElementById('confirmModal');
        const closeBtn = document.getElementById('closeConfirm');
        const backBtn = document.getElementById('backConfirm');
        const submitBtn = document.getElementById('submitConfirm');
        const confirmStatus = document.getElementById('confirmStatus');
        const confirmMemo = document.getElementById('confirmMemo');

        const statusSelect = form.querySelector('[name="status"]');
        const memoTextarea = form.querySelector('[name="memo"]');

        function fillConfirm() {
          const label = statusSelect?.options?.[statusSelect.selectedIndex]?.text ?? '';
          confirmStatus.textContent = label;

          const memo = memoTextarea?.value ?? '';
          confirmMemo.textContent = memo.trim() ? memo : '未入力';
        }

        function openModal() {
          fillConfirm();
          if(submitBtn) {
            submitBtn.disabled = false;
          }
          modal.showModal();
        }

        function closeModal() {
          modal.close();
        }
        
        openBtn.addEventListener('click', openModal);
        closeBtn?.addEventListener('click', closeModal);
        backBtn?.addEventListener('click', closeModal);

        modal.addEventListener('close', () => {
          // Escで閉じたときなど、必要ならここで後処理を追加
        });

        // 背景クリックで閉じる
        modal.addEventListener('click', (e) => {
          const rect = modal.getBoundingClientRect();
          const isInDialog =
            (rect.top <= e.clientY && e.clientY <= rect.bottom) &&
            (rect.left <= e.clientX && e.clientX <= rect.right)
          
          if(!isInDialog) {
            closeModal();
          }
        });

        // 二重送信防止
        submitBtn?.addEventListener('click', () => {
          sumbitBtn.disabled = true;
        });

      </script>
    </section>
  </div>
</div>
@endsection