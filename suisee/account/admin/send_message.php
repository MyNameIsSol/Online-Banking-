<?php
include 'header.php';
?>

<?php
 $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($url, 'msgsuc') == true){
    echo '<script>alert("Success! Message Sent");</script>';
}
?>
        <main class="page-content">
            <div class="container container--flex">
                <div class="page-header">
                    <h1 class="page-header__title text-danger">Send Email/Message to client</h1>
                </div>
                <div class="page-tools">
                    <div class="page-tools__breadcrumbs">
                        <div class="breadcrumbs">
                            <div class="breadcrumbs__container">
                                <ol class="breadcrumbs__list">
                                    <li class="breadcrumbs__item">
                                        <a class="breadcrumbs__link" href="dashboard.php">
                                            <svg class="icon-icon-home breadcrumbs__icon">
                                                <use xlink:href="#icon-home"></use>
                                            </svg>
                                            <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                                                <use xlink:href="#icon-keyboard-right"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="breadcrumbs__item "><a class="breadcrumbs__link" href="dashboard.php"><span>Home</span>
                        <svg class="icon-icon-keyboard-right breadcrumbs__arrow">
                          <use xlink:href="#icon-keyboard-right"></use>
                        </svg></a>
                                    </li>
                                   
                                    <li class="breadcrumbs__item active"><span class="breadcrumbs__link">Message</span>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card add-product card--content-center">
                    <div class="card__wrapper">
                        <div class="card__container">
                            <form method="POST" action="../../scripts/sendmessagescript.php">
                                <div class="add-product__row">

                                   <div class="add-product__right">
                                        <div class="row row--md">
                                            <div class="col-12 form-group form-group--lg">
                                                <label class="form-label">Subject</label>
                                                <div class="input-group">
                                                    <input class="input" type="text" name="subject" placeholder="i.e (Account Activation" required>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group form-group--lg">
                                                <label class="form-label">Message</label>
                                                <div class="input-group">
                                            <textarea class="input" style="height: 100px;" type="text" name="message" placeholder="Write a message" required></textarea>
                                        </div>
                                            </div>
                                            <div class="col-12 form-group form-group--lg">
                                                <label class="form-label">Department</label>
                                                <div class="input-group input-group--append">
                                                    <select class="input js-input-select input--fluid" value="<?= isset($department) ? $department : "" ?>" name="support" data-placeholder="Select Support Department" required>
                                                        <option value="<?= isset($department) ? $department : "" ?>" selected="selected"><?= isset($department) ? $department : "" ?>
                                                        </option>
                                                        <option value="Customer Care">Customer Care
                                                        </option>
                                                        <option value="Account Office">Account Office
                                                        </option>
                                                        <option value="Service Department">Service Department
                                                        </option>
                                                    </select><span class="input-group__arrow">
                              <svg class="icon-icon-keyboard-down">
                                <use xlink:href="#icon-keyboard-down"></use>
                              </svg></span>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group form-group--lg">
                                                <label class="form-label">Select User</label>
                                                <div class="input-group input-group--append">
                                                    <select class="input js-input-select input--fluid" name="uid" data-placeholder="">
                                                        <option value="Select Client" selected="selected">Select User to email
                                                        </option>
                                                        <?php
                                                        $sql = "SELECT * FROM users ";
                                                        $result = mysqli_query($conn, $sql);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($data = mysqli_fetch_assoc($result)) {
                                                                $acctname = $data['acctname'];
                                                                $uid = $data['uid'];

                                                                echo '<option value="' . $uid . '">' . $acctname . '
                                                                </option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select><span class="input-group__arrow">
                              <svg class="icon-icon-keyboard-down">
                                <use xlink:href="#icon-keyboard-down"></use>
                              </svg></span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 form-group form-group--lg">
                                                <label class="form-label">Date</label>
                                                <div class="input-group input-group--prepend">
                                                    <div class="input-group__prepend"><span class="input-group__symbol"><svg class="icon-icon-calendar">
                                                                    <use xlink:href="#icon-calendar"></use>
                                                                </svg></span>
                                                    </div>
                                                    <input class="input" name="date" type="text" placeholder="" value="<?= date('Y-m-d') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 form-group form-group--lg">
                                                <label class="form-label">Time</label>
                                                <div class="input-group input-group--prepend">
                                                    <div class="input-group__prepend"><span class="input-group__symbol"><svg class="icon-icon-clock">
                                                            <use xlink:href="#icon-clock"></use>
                                                        </svg></span>
                                                    </div>
                                                    <input class="input" type="text" name="time" placeholder="" value="<?= date('H:i:s') ?>" required>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="add-product__submit">
                                            <div class="modal__footer-button">
                                                <button class="my-btn  text-center" type="submit" name="send_msg"><span class="button__text">Send Message</span>
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="modal modal-compact modal-success" id="addProductSuccess">
        <div class="modal__overlay" data-dismiss="modal"></div>
        <div class="modal__wrap">
            <div class="modal__window">
                <div class="modal__content">
                    <div class="modal__body">
                        <div class="modal__container">
                            <img class="modal-success__icon" src="img/content/checked-success.svg" alt="#">
                            <h4 class="modal-success__title">Product was added</h4>
                        </div>
                    </div>
                    <div class="modal-compact__buttons">
                        <div class="modal-compact__button-item">
                            <button class="modal-compact__button button" data-dismiss="modal" data-modal="#addProduct"><span class="button__text">Add new product</span>
                            </button>
                        </div>
                        <div class="modal-compact__button-item">
                            <button class="modal-compact__button button" data-dismiss="modal"><span class="button__text">Close</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/photoswipe/photoswipe-lightbox.esm.min.js" type="module"></script>
    <script src="js/photoswipe/photoswipe.esm.min.js" type="module"></script>
    <script src="js/gsap/gsap.min.js"></script>
    <script src="js/gsap/ScrollToPlugin.min.js"></script>
    <script src="js/gsap/ScrollTrigger.min.js"></script>
    <script src="js/vendor.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/photoswipe/gallery.js" type="module"></script>
</body>


<!-- Mirrored from netgon.ru/themeforest/arion_html/product-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Sep 2022 21:04:40 GMT -->
</html>