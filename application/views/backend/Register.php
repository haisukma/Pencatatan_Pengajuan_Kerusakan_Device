<!-- BEGIN: Login Form -->
<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
    <div
        class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <form class="user" role="form" method="post" action="<?php echo site_url('auth/save') ?>">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                Register
            </h2>
            <div class="intro-x mt-3">
                <?php if (isset($register_error) && $register_error): ?>
                    <div class="text-danger mb-3">
                        Username sudah digunakan, harap pilih username lain.
                    </div>
                <?php endif; ?>
                <input type="text" class="intro-x login__input form-control py-3 px-4 block" name="username"
                    placeholder="Username" autocomplete="off" autofocus>
                <input type="pswd_users" class="intro-x login__input form-control py-3 px-4 block mt-4" name="pswd_users"
                    placeholder="Password" autocomplete="off">
                <!-- <select id="level" name="level" class="intro-x login__input form-control py-3 px-4 block mt-4">
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select> -->
            </div>
            <div class="intro-x mt-5 xl:mt-6 text-center xl:text-left">
                <button type="submit" class="btn btn-primary py-3 px-4 w-full align-top">Register</button>
            </div>
            <div class="intro-x mt-5 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                <p>Have an Account? <a href="<?php echo site_url('auth') ?>"
                        class="text-primary px-2 w-full xl:w-32 mt-3 xl:mt-0 align-top">Login</a></p>
            </div>
        </form>
    </div>
</div>
<!-- END: Login Form -->