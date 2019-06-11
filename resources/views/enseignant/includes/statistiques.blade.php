<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-stats one">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <p class="card-category"><strong>Publications</strong></p>
                <h2 class="card-title pl-5 ml-5">{{count($user->publications)}}</h2>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="fas fa-comments mx-1"></i> App Downloads / Sales
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-stats two">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-book"></i>
                </div>
                <p class="card-category"><strong>Total des classes</strong></p>
                <h2 class="card-title pl-5 ml-5">{{count($user->classes)}}</h2>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="fas fa-comments mx-1"></i> App Downloads / Sales
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-stats four">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <p class="card-category"><strong>Étudiants actifs</strong></p>
                <h2 class="card-title pl-5 ml-5">{{$etudiantsActifs}}</h2>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="fas fa-comments mx-1"></i> App Downloads / Sales
                </div>
            </div>
        </div>
    </div>
</div>