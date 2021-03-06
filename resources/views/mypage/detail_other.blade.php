@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/mypage_other.css">
@endsection

@section('main')
  <div class="row">

        <div class="profile col s12">
          <div class="profile-rap col s12 center">
            <a class="chat-btn btn-floating waves-effect waves-light green"><i class="material-icons">chat</i></a>

            {{-- <img class="image circle" src="{{ $profile['profile_image'] }}" alt=""> --}}
            <img class="image circle" src="{{App\Profile::find(Auth::user()->profile_id)->profile_image}}" alt="">
            @if($user2_id === null)
            <a class="add-btn btn-floating waves-effect waves-light modal-trigger red" href="#modal1">
              <i class="material-icons">add</i>
            </a>
              <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4>フォローリクエスト</h4>
                    <p>このユーザーの読者になりますか？</p>
                  </div>
                  <div class="modal-footer">
                    <form role="form" method="POST" action="{{ route('user_follow_request') }}">
                      {{ csrf_field() }}
                    <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">OK</button>
                      <input type="hidden" name="user_id" value="{{ $id }}">
                    </form>
                  </div>
                </div>
              @else
              <a class="add-btn btn-floating waves-effect waves-light modal-trigger blue" href="#modal1">
                <i class="material-icons">remove</i>
              </a>
              <!-- Modal Structure -->
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4>フォロー解除</h4>
                  <p>フォロー解除しますか？</p>
                </div>
                <div class="modal-footer">
                  <form role="form" method="POST" action="{{ route('user_unfollow_request') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">OK</button>
                    <input type="hidden" name="user_id" value="{{ $id }}">
                  </form>
                </div>
              </div>
              @endif
          </div>
        </div>

      <div class="prfbox col s12">
        <div class="username center-align">
          <h1>{{ $profile->profile_name }}</h1>
          {{-- <div class="follow-button col s12 center-align">
            <a class="waves-effect waves-light btn">フォロー</a>
          </div> --}}
        </div>

        <div class="prf col s12">
          <div class="prf-content col s4">
            <h1 class="item" id="">投稿</h1>
            <label class="item-sub" for="">XXX</label>
          </div>
          <div class="prf-content col s4">
            <a class="color" href="{{ route('user_mypage_follow') }}"><h1 class="item" id="follow">フォロー</h1></a>
            <label class="item-sub" for="follow">{{ $follow_ct }}</label>
          </div>
          <div class="prf-content col s4">
            <a class="color" href="{{ route('user_mypage_follower') }}"><h1 class="item" id="follower">フォロワー</h1></a>
            <label class="item-sub" for="follower">{{ $follower_ct }}</label>
          </div>
        </div>

        <div class="prf col s12">
          <div class="prf-content col s4">
            <h1 class="item" id="department">学科</h1>
            <label class="item-sub" for="department">{{ $course->course_major }}</label>
          </div>
          <div class="prf-content col s4">
            <h1 class="item" id="course">コース</h1>
            <label class="item-sub" for="course">{{ $course->course_name }}</label>
          </div>
          <div class="prf-content col s4">
            <h1 class="item" id="year">学年</h1>
            <label class="item-sub" for="year">{{ $sc_year }}年</label>
          </div>
        </div>

        <div class="prf-text col s12 left-align">
          <h2 class="text col s12">{{ $profile->profile_url }}</h2>
        </div>
      </div>

      <div class="border col s12"></div>

      <div class="wap col s12">
        @for ($i=1; $i < 5; $i++)
          <div class="col s6">
            <div class="card">
              <div class="card-image">
                <a href="{{ route('user_article_detail',1) }}"><img src="/images/sample-{{ $i }}.jpg"></a>
                <span class="card-title">記事タイトル</span>
              </div>
              <div class="card-content">
                <p class="card-text">ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示</p>
              </div>
              <div class="card-action">
                <a href="{{ route('user_article_detail',1) }}">READ MORE</a>
                <div class="tags">
                  <div class="chip">
                    IT
                  </div>
                  <div class="chip">
                    デザイン
                  </div>
                </div>

                {{-- カウンター 実装するか検討 --}}
                {{-- <div class="counter">
                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                  <label class="showcounter" for="counter">100</label>
                </div>
                <div class="counter">
                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                  <label class="showcounter" for="counter">1000</label>
                </div> --}}

              </div>
            </div>
          </div>
        @endfor
      </div>

  </div>

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    });
  </script>
@endsection
