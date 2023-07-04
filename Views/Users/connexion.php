<h1>Page de connexion</h1>
<form method="post" action="">
    <fieldset>
        <legend>Connexion</legend>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="text" placeholder="Email" class="form-control" id="Email" name="email" value="">
            <?php if (isset($messageErreur["email"])) : ?>
                <p class="mt-2 text-sm text-red-600">
                    <?= $messageErreur["email"] ?>
                </p>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" class="form-control" id="Password" name="mot_de_passe" value="">
            <?php if (isset($messageErreur["mot_de_passe"])) : ?>
                <p class="mt-2 text-sm text-red-600">
                    <?= $messageErreur["mot_de_passe"] ?>
                </p>
            <?php endif ?>
        </div>
        <?php if (isset($wrong)) : ?>
            <p>Email et/ou mot de passe incorrect </p>
        <?php endif ?>
        <div>
            <button name="btnEnvoi" class="btn btn-primary" value="Envoyer">Envoyer</button>
        </div>
    </fieldset>
</form>