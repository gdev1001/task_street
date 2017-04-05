<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Task View</title>
    
<link rel='stylesheet prefetch' href='http://cdn.rawgit.com/trazyn/neoui-ng/master/dist/neoui-0.1.0.min.css'>
<link rel='stylesheet prefetch' href='http://cdn.rawgit.com/trazyn/neoui-ng/master/dist/app.min.css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>


<style>
    a:hover {
        text-decoration: none;
        color:#ddd;
    }

    a{

        color:black;
    }

</style>


  </head>

  <body>

    
<div ng-app="demo.tree">
<div>
    <a href="{{ url('/resume') }}"><span class = "glyphicon glyphicon-remove" style = "
    position: fixed;
    top: 50px;
    left: 50px;
"><span></a>
</div>

<ul id="anchors" class="md-anchor">
    <li data-anchor="example" class="md-anchor-item active">Web development</li>

    <li class="md-anchor-item">Front-end
        <ul>
            <a href = "#view"><li data-anchor="markup" class="md-anchor-item">View</li></a>
            <a href = "#model"><li data-anchor="javascript" class="md-anchor-item">Model</li></a>
            <a href = "#control"><li data-anchor="sTree" class="md-anchor-item">Control</li></a>
        </ul>
    </li>

    <li class="md-anchor-item">Back-end
        <ul>
            <a href = "#database"><li data-anchor="html" class="md-anchor-item">Database</li></a>
            <a href = "#routine"><li data-anchor="#routine" class="md-anchor-item">Routine</li></a>
            <a href = "#gitlab"><li data-anchor="#gitlab" class="md-anchor-item">Git Api</li></a>
        </ul>
    </li>
</ul>

<section id="tree" ng-controller="treeController">

    <header data-anchor="example">Shuwei Yang</header>

    <header>Home-Page</header>
    <section>
        <div class="md-ribbon" data-anchor="markup">
            <span>View</span>
        </div>

        <div id = "view" class="wrap">
            <label>Html</label>
            <xmp>
                <div class = "container intro">
                    <div class = "row">
                        <div class = "navbar_container col-xs-12 space">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar" style = "  height: 10px;color: white;">About Us</span>
                                    <span class="icon-bar" style = "  height: 10px;color: white;">What we do</span>
                                    <span class="icon-bar" style = "  height: 10px;color: white;">Join Us</span>
                                </button>
                                <a class="navbar-brand" href="#">Shokes</a>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <a class="navbar-brand logo" href="#" style = "height:40px"></a>
                                <ul class="nav navbar-nav">
                                    <li role="presentation" class="active"><a href="#">HOME</a></li>
                                    <li role="presentation"><a href="#">WHAT WE DO</a></li>
                                    <li role="presentation"><a href="#">MESSAGES</a></li>
                                    <li role="presentation"><a href="#">ABOUT US</a></li>
                                    <li role="presentation" class= "companyLogin"><a href="#" class = "box">COMPANY</a></li>
                                    <li class = "sep">
                                    <li role="presentation" class = "studentLogin"><a href="#" class = "box">STUDENT</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class = "col-xs-12 text"style = "margin-top:10%">
                            <h1 style ="font-family:Lato;font-size:50px;font-weight:100">
                                The Place For Innovation Talent & Connection
                            </h1>
                            <h3 style = "font-family:Lato; -webkit-font-smoothing:antialiased">
                                connect and guide next generation
                                of engineer to change the world
                            </h3>
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}" id="loginform">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class = "col-xs-2 col-xs-offset-4" style="width:20%; margin-top:5%">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email"
                                       autofocus=""
                                       style="height:50px; background-color: transparent;">
                            </div>
                            <div class="col-xs-2" style="text-align: center;margin-top:5%">
                                <button type="submit" class="btn  btn-primary" style="height: 50px;width:60%; background-color: transparent;float:left;margin-left:-12%;font-family:'Roboto'">Sign Up</button>
                            </div>
                        </form>
                        <div class = "col-xs-12" style = "margin-top: 30%;">
                            <div class="arrow-down" style = "margin-left:50%"></div>
                        </div>
                    </div>
                </div>
            </xmp>
        </div>

        <div class="wrap">
        <label>Javascript</label>
        <xmp>
            <script type = "text/javascript">
                $(document).ready(function(){

                    var canvas, ctx, w, h;

                    var h = window.innerHeight;
                    var w = window.innerWidth;

                    var canvas = document.getElementById('myCanvas');

                    ctx = canvas.getContext('2d');

                    function paintCanvas(){
                        ctx.fillStyle = "rgba(0,0,0,1)";
                        ctx.fillRect(0,0,w,h);
                    }


                    function particle(r,off,c){
                        this.x = Math.random()*w;
                        this.y = Math.random()*h;
                        this.r = r;
                        this.offset = Math.random()*50+off;
                        this.color = "rgba(255,255,255,"+c+")"
                        this.draw = function(){
                            ctx.fillStyle = this.color;
                            ctx.beginPath();
                            ctx.arc(this.x,this.y,this.r,Math.PI*2,false);
                            ctx.fill();
                        }

                    }

                    var layer_1 = [],
                            layer_2 = [],
                            layer_3 = [];

                    var layer_1_num = 40;
                    var layer_2_num = 40;
                    var layer_3_num = 100;


                    for(i=0;i<layer_1_num;i++){
                        layer_1.push(new particle(4,20,0));

                    }
                    for(i=0;i<layer_2_num;i++){
                        layer_2.push(new particle(2.5,40,0));
                    }
                    for(i=0;i<layer_3_num;i++){
                        layer_3.push(new particle(1,60,0));
                    }

                    function draw(){
                        for(i=0;i<layer_1.length;i++){
                            var p = layer_1[i];
                            p.draw();
                            update(p);
                            checkBounds(p);
                            for(var j=i+1;j<layer_3.length;j++){
                                p2 = layer_3[j];
                                distance(p,p2,w*1.5);
                            }

                        }
                        for(i=0;i<layer_2.length;i++){
                            var p = layer_2[i];
                            p.draw();
                            update(p);
                            checkBounds(p);
                            for(var j=i+1;j<layer_3.length;j++){
                                p2 = layer_3[j];
                                distance(p,p2);
                            }
                        }
                        for(i=0;i<layer_3.length;i++){
                            var p = layer_3[i];
                            p.draw();
                            update(p);
                            checkBounds(p);
                            for(var j=i+1;j<layer_3.length;j++){
                                p2 = layer_3[j];
                                distance(p,p2);
                            }
                        }
                    }
                    function update(p){
                        p.x = p.x - mouse.x/p.offset;
                        p.y = p.y - mouse.y/p.offset;
                    }
                    function checkBounds(p){
                        if(p.x > w  ){
                            p.x =0;
                        }
                        else if(p.x < 0){
                            p.x =w;
                        }
                        if(p.y > h){
                            p.y =0;
                        }
                        else if(p.y < 0){
                            p.y = h;
                        }
                    }

                    var minDist = w*0.7;

                    function distance(p1,p2){
                        var dist;
                        var dx = p1.x - p2.x;
                        var dy = p1.y - p2.y;
                        dist = Math.sqrt(dx*dx + dy*dy);

                        if (dist <= minDist){
                            ctx.beginPath();
                            ctx.strokeStyle = "rgba(255,255,255,"+ (0.2-dist/minDist) +")";
                            ctx.moveTo(p1.x, p1.y);
                            ctx.lineTo(p2.x, p2.y);
                            ctx.stroke();
                            ctx.closePath();
                        }
                    }

                    var mouse ={
                        x:0,
                        y:0
                    }

                    document.addEventListener('mousemove', function(e){
                        mouse.x = e.clientX  -w/2|| e.pageX -w/2;
                        mouse.y = e.clientY -h/2|| e.pageY -h/2;
                    }, false);

                    function animate(){
                        paintCanvas();
                        draw();
                        requestAnimationFrame(animate);
                    }
                    // setInterval(function(){
                    // 	paintCanvas();
                    // 	draw();
                    // },30);
                    animate();
                });

            </script>
        </xmp>
        <p class="note">The Home Page View</p>
        </div>
    </section>

    <section>
        <div id = "model" class="md-ribbon" data-anchor="javascript">
            <span>Model</span>
        </div>

        <xmp>
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function tasks()
    {
        return $this->belongsToMany('App\task')->withTimestamps();
    }

    public function resume()
    {
        return $this ->hasOne('App\resume');
    }

    public function rank()
    {
        return $this ->hasMany('App\rank');
    }

    public function ranks()
    {
        return $this ->hasMany('App\rank');
    }

    public function skill()
    {
        return $this->belongsToMany('App\skill');
    }

    public function skills()
    {
        return $this->hasMany('App\SkillUser');
    }

}

</xmp>

    </section>

    <section>
        <div id = "control" class="md-ribbon" data-anchor="sTree">
            <span>Controller</span>
        </div>

        <blockquote class="required">
            <p><code>__construct()

                </code>-null</p>
            <footer>
                Initial the authority and session check
            </footer>
        </blockquote>
        <br>

        <blockquote class="required">
            <p><code>index()</code> - direct</p>
            <footer> direct user to home page </footer>
        </blockquote>
        <br>

        <blockquote class="required">
            <p><code>index()</code> - direct</p>
            <footer> direct user to home page </footer>
        </blockquote>
        <br>

    </section>

    <header data-anchor="api">Back-End</header>
    <section>
        <div id = "routine" class="md-ribbon" data-anchor="html">
            <span>Routine</span>
        </div>

        <xmp>
            Route::get('/', 'WelcomeController@index');

            Route::controllers([
            'auth' => 'Auth\AuthController',
            'password' => 'Auth\PasswordController',
            ]);
            //Route::get('test', 'TaskController@index');
        </xmp>
    </section>

    <br>
    <br>

    <section>
        <div id = "database" class="md-ribbon" data-anchor="constructor">
            <span>Database</span>
        </div>

        <h5><code>php artisan migrate</code></h5>
        <blockquote>
            <p><code>mysql</code> - database</p>
        </blockquote>

    <xmp>
        Schema::create('users', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password', 60);
        $table->rememberToken();
        $table->timestamps();
        $table->boolean('isStudent')->default(true);
        $table->boolean('isCompany')->default(false);
        });


        Schema::create('student', function (Blueprint $table) {

        $table->integer('id')->unsigned();
        $table->foreign('id')->references('id')->on('users');

        });

        Schema::create('company', function (Blueprint $table) {
        $table->increments('id');
        });

    </xmp>
    </section>

    <br>
    <br>

    <section>
        <div id = "gitlab" class="md-ribbon" data-anchor="options">
            <span>Gitlab API</span>
        </div>

        <blockquote class="required">
            <p><code>Gitlab::('api')</code> - Call Gitlab api</p>
            <footer>
                <code>"api"->endppoint</code>Direct to the service on<code>endppoint</code>
            </footer>
        </blockquote>
        <br>



        <blockquote class="required">
            <p><code>Gitlab->project</code> - Calling project package</p>
            <footer>
                <mark>Project->all()</mark>Retrieve all project on user account
            </footer>
        </blockquote>
        <br>

        <blockquote class="required">
            <p><code>data</code> - null</p>
            <xmp>
                //        dd(Gitlab::api('repositories')->blob('master','.env.example'));
            </xmp>
            <footer>
                <code>Blob</code>return<code>content of env.emaple</code>
            </footer>
        </blockquote>
        <br>




    </section>

    <br>
    <br>


    </section>
</section>
</div>
    <script src='http://cdn.rawgit.com/trazyn/neoui-ng/master/dist/vendor.min.js'></script>
<script src='http://cdn.rawgit.com/trazyn/neoui-ng/master/dist/neoui-0.1.0+std.min.js'></script>

    <script type="text/javascript" src="{{asset('js/repo.js') }}"></script>





  </body>
</html>
