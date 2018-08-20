<footer>
    <div class="jumbotron" style="background-color: white;">
        <div class="row">
            <div class="col-md-6">
                <h3>Our contacts:</h3>
                <ul>
                    <li>First contact</li>
                    <li>Second contact</li>
                    <li>Third contact</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Socials:</h3>
                <ul>
                    <li><a href=""><img src="" alt="Вконтакте"></a></li>
                    <li><a href=""><img src="" alt="Facebook"></a></li>
                    <li><a href=""><img src="" alt="Instagram"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <p>© {{ config('app.name') }} {{ Carbon\Carbon::now()->year }}</p>
    <br>
</footer>