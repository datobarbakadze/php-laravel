
<footer class="footer-area">
    <div class="container">
        <div class="col-md-12">
            <div class="footer-copyr-logo">
                <img src="{{ asset('assets/img/logo-1.png') }}" alt="">
                <p>© 2019 All rights reserved by VoidCodersTM</p>
            </div>
            <div class="footer-social">
                <ul>
                    <li><a href="https://twitter.com/voidcoders"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.behance.net/voidcoders"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.facebook.com/voidcoders/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.pinterest.com/voidthemes/"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/voidcoders/about/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @if(request()->user()!=null && request()->user()->role==1)
        <script src="{{ asset('assets/js/admin-functions.js') }}"></script>
        <script src="{{ asset('assets/js/admin.js') }}"></script>

        <script type="text/javascript">
            CKEDITOR.replace('description',{
                filebrowserImageUploadUrl : "{{ route('ckuploader') }}",
            });
        </script>
    @endif
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=293640018349203&autoLogAppEvents=1" nonce="nqKhnO8Z"></script>
</footer>
