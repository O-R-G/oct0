<?
    /*
        view for send in blue subscription widget
    */

    ?><style>
      .newsletter {
        position: fixed;
        bottom : 15px;
        left : 80px;
      }

      .sib-form,
      #sib-container,
      .sib-container--large,
      .sib-container--vertical,
      .sib-form-block,
      .sib-form-block__button,
      .sib-form .input:last-child, .sib-form .input__affix:last-child,
      .sib-form .input:first-child, .sib-form .input__affix:first-child {
        padding : 0!important;
      }

      .sib-form .input:not(textarea), .sib-form .input__button {
        height : initial!important;
      }
      .stayin {
        line-height: 1.3;
        float : left;
        padding-right : 9px;
      }
      .sib-form-block__button {
        font-weight : 400!important;
      }

      .sib-form-block__button-with-loader {
        min-height : 0px!important;
      }

      .sib-form .entry__field,
      .entry__field {
        margin : 0!important;
      }

      .input:focus,
      .input:focus-within,
      .entry__field:focus-within {
        outline: none!important;
        -webkit-appearance: none;
      }

      .sib-form .entry__field:focus-within {
        box-shadow : 0 0 0 0px #fff!important;
      }

      .form__label-row--horizontal {
        margin : 0!important;
      }

      .sib-form .entry__field {
        border : 0px!important;
        border-bottom : 1px solid black!important;
        border-radius: 0px!important;
      }

      .sib-form {
        /* width : 90vw!important; */
      }

      #sib-container{
        /* display: block!important;
        width : initial!important; */
      }

      .line-email {
        float : left;
        min-width : 200px;
      }

      .sib-form-block__button,
      .sib-form-block__button-with-loader {
        padding-left : 9px!important;
      }

      #error-message {
        border : 0px!important;
        border-radius : 0px!important;
        background-color: white!important;
        padding : 0!important;
      }
      .sib-form-message-panel__text,
      .sib-form-message-panel__text--center {
        padding : 0!important;
      }

      .sib-form-message-panel__inner-text{
        color : black!important;
      }
      .entry__error,
      .entry__error--primary {
        color : black!important;
        background-color: white!important;
      }

      #sib-container input:-ms-input-placeholder {
        text-align: left;
        /* font-family: "Helvetica", sans-serif; */
        color: #c0ccda;
      }

      #sib-container input::placeholder {
        text-align: left;
        /* font-family: "Helvetica", sans-serif; */
        color: #c0ccda;
      }

      #sib-container textarea::placeholder {
        text-align: left;
        /* font-family: "Helvetica", sans-serif; */
        color: #c0ccda;
      }

      .newsletter-container {
        display: flex;
        width : 95vw;
      }

      #sib-container {
        margin : 0!important;
        width : initial!important;
      }

      #sib-form {
        display: flex;
      }

      .sib-form,
      .sib-form-block,
      .sib-form-block__button {
        font-family: mtdbt2f4d-8, Helvetica, Arial, sans-serif !important;
        font-size: 18px !important;
        line-height: 22px !important;
      }
    </style>
    <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">


  
    <div class="newsletter">

    <!-- Begin Sendinblue Form -->

<div class="sib-form" style="text-align: left; background-color: #FFF;">
  <div id="sib-form-container" class="sib-form-container">
    <div id="error-message" class="sib-form-message-panel" style="text-align:left; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;max-width:540px;">
      <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
        <!-- <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
          <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
        </svg> -->
        <span class="sib-form-message-panel__inner-text">
                          We could not confirm your subscription.
                      </span>
      </div>
    </div>
    <div></div>
    <div id="success-message" class="sib-form-message-panel" style="text-align:left; color:#085229; background-color:#e7faf0; border-radius:3px; border-color:#13ce66;max-width:540px;">
      <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
        <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
          <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
        </svg>
        <span class="sib-form-message-panel__inner-text">
                          Subscription confirmed !
                      </span>
      </div>
    </div>
    <div></div>
      <div class="newsletter-container">
        <!--<div class="stayin">Subscribe</div>-->

        <div id="sib-container" class="sib-container--large sib-container--horizontal" style="text-align:left; background-color:transparent; max-width:540px; border-width:0px; border-color:#ffffff; border-style:solid;">
        <form id="sib-form" method="POST" action="https://495e63c0.sibforms.com/serve/MUIEAIvujuho9qdSwFgl5vlKCZEV4NfHnLNGIbYnztiO-uMQ5qKoLnDFdMhIEgcRwna7FauS_rkTB13vGIbIu0fZQqfCYxr2tHXuo3kBBJmxMh2hHJ7q5IziEBpsQgfZjnShytC74YIAgVNj2BjG5VIlxI3t-PWDjW_ylXYokAZEQGskc4g2XEUe70ZzSrrTLO3SiRO_oH1vf-vB" data-type="subscription">
          <div class="line-email">
            <div class="sib-input sib-form-block">
              <div class="form__entry entry_block">
                <div class="form__label-row form__label-row--horizontal">

                  <div class="entry__field">
                    <input class="input" type="text" id="EMAIL" name="EMAIL" autocomplete="off" data-required="true" required style="outline:none;" />
                  </div>
                </div>

                <label class="entry__error entry__error--primary" style="text-align:left; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;">
                </label>
              </div>
            </div>
          </div>
          <div >
            <div class="sib-form-block" style="text-align: left">
              <button class="sib-form-block__button sib-form-block__button-with-loader" style="text-align:left; color:#000000; background-color:#ffffff; border-radius:3px; border-width:0px;" form="sib-form" type="submit">
                <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512">
                  <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                </svg>
                    <!-- <img class='inline-svg' src='media/svg/arrow-right-12-k.svg'> -->
                    <!-- touch! -->
              </button>
            </div>
          </div>

          <input type="text" name="email_address_check" value="" class="input--hidden">
          <input type="hidden" name="locale" value="fr">
        </form>
      </div>
    </div>
  </div>
</div>

  </div>


<!-- START - We recommend to place the below code in footer or bottom of your website html  -->
<script>
  window.REQUIRED_CODE_ERROR_MESSAGE = 'Veuillez choisir un code pays';
  window.LOCALE = 'fr';
  window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "The set informations are not valid. Please try again.";

  window.REQUIRED_ERROR_MESSAGE = "You must fill this form. ";

  window.GENERIC_INVALID_MESSAGE = "The set informations are not valid. Please try again.";

  window.translation = {
    common: {
      selectedList: '{quantity} liste sélectionnée',
      selectedLists: '{quantity} listes sélectionnées'
    }
  };

  var AUTOHIDE = Boolean(0);
</script>
<script src="https://sibforms.com/forms/end-form/build/main.js"></script>

<!-- End Sendinblue Form -->
