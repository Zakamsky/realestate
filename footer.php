<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper wrapper-footer bg-primary" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">
footer there
                        <button class="btn btn-secondary">this</button>
                        <button class="btn btn-outline-secondary">aqui</button>
<!--						--><?php //understrap_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: none;">
    <symbol viewBox="0 0 512 512" id="blueprint">
        <path d="m503.464844 0h-494.929688c-4.714844 0-8.535156 3.820312-8.535156 8.535156v281.597656c0 4.714844 3.820312 8.535157 8.535156 8.535157h145.066406v204.796875c0 4.714844 3.820313 8.535156 8.53125 8.535156h341.332032c4.714844 0 8.535156-3.820312 8.535156-8.535156v-494.929688c0-4.714844-3.820312-8.535156-8.535156-8.535156zm-8.53125 494.933594h-324.265625v-204.800782c0-4.710937-3.820313-8.53125-8.535157-8.53125h-145.066406v-264.535156h477.867188zm0 0"/><path d="m42.667969 264.535156h119.464843c4.714844 0 8.535157-3.824218 8.535157-8.535156v-51.199219h17.066406v51.199219c0 4.710938 3.820313 8.535156 8.53125 8.535156h110.933594v17.066406h-110.933594c-4.710937 0-8.53125 3.820313-8.53125 8.53125v179.199219c0 4.714844 3.820313 8.535157 8.53125 8.535157h127.308594c.324219.085937.65625.152343.992187.199218h.035156l50.671876-.199218h94.058593c4.714844 0 8.535157-3.820313 8.535157-8.535157v-179.199219c0-4.710937-3.820313-8.53125-8.535157-8.53125h-34.132812v-17.066406h34.132812c4.714844 0 8.535157-3.824218 8.535157-8.535156v-213.332031c0-4.714844-3.820313-8.535157-8.535157-8.535157h-273.066406c-4.710937 0-8.53125 3.820313-8.53125 8.535157v34.132812h-17.066406v-34.132812c0-4.714844-3.820313-8.535157-8.535157-8.535157h-119.464843c-4.714844 0-8.535157 3.820313-8.535157 8.535157v213.332031c0 4.710938 3.820313 8.535156 8.535157 8.535156zm162.132812 68.265625h34.132813v93.867188h-34.132813zm127.742188 17.03125 85.335937-.339843.316406 68.472656-42.628906.167968-42.707031.171876zm51.628906 85.335938 34.105469-.132813.113281 25.59375-34.125.136719zm-51.226563.199219 34.160157-.132813.09375 25.566406h-34.144531zm-34.277343-350.035157h17.066406v34.132813h-17.066406zm34.132812 0h51.199219v25.601563h-51.199219zm68.265625 0h17.066406v34.132813h-17.066406zm25.601563-34.132812v17.066406h-136.535157v-17.066406zm-273.066407 0v34.132812c0 4.714844 3.820313 8.535157 8.53125 8.535157h30.03125l65.707032 82.128906c2.941406 3.679687 8.3125 4.28125 11.996094 1.335937 3.679687-2.941406 4.277343-8.3125 1.335937-11.996093l-66.402344-83v-31.136719h68.265625v25.601562c0 4.710938 3.820313 8.53125 8.535156 8.53125v42.667969c0 4.710938 3.820313 8.535156 8.53125 8.535156h34.132813c4.714844 0 8.535156-3.824218 8.535156-8.535156h51.199219c0 4.710938 3.820312 8.535156 8.535156 8.535156h34.132813c4.710937 0 8.53125-3.824218 8.53125-8.535156v-42.667969c4.714843 0 8.535156-3.820312 8.535156-8.53125v-25.601562h17.066406v196.265625h-31.445312l-83.128907-58.191406c-3.863281-2.621094-9.113281-1.65625-11.789062 2.167968-2.675781 3.824219-1.78125 9.089844 2.003906 11.816406l81.691406 57.183594v29.691406c0 4.714844 3.820313 8.535157 8.535157 8.535157h34.132812v162.132812h-25.339843l-.160157-34.203125c0-.058594.03125-.105468.03125-.164062s-.03125-.105469-.03125-.164063l-.402343-85.382812c-.023438-4.695313-3.835938-8.488281-8.53125-8.492188h-.035157l-102.398437.40625c-2.265625.007813-4.433594.917969-6.027344 2.523438-1.59375 1.609375-2.484375 3.785156-2.472656 6.050781l.554687 119.425781h-111.1875v-17.066406h42.664063c4.714844 0 8.535156-3.820313 8.535156-8.535156v-110.933594c0-4.710937-3.820312-8.53125-8.535156-8.53125h-42.664063v-17.066406h110.933594c4.710937 0 8.53125-3.820313 8.53125-8.535157v-34.132812c0-4.710938-3.820313-8.535156-8.53125-8.535156h-110.933594v-51.199219c0-4.710937-3.820312-8.53125-8.535156-8.53125h-34.132813c-4.710937 0-8.53125 3.820313-8.53125 8.53125v51.199219h-102.402343v-17.066406h42.667969c4.710937 0 8.53125-3.820313 8.53125-8.53125v-145.066407c0-4.714843-3.820313-8.535156-8.53125-8.535156h-42.667969v-17.066406zm-102.402343 34.132812h34.132812v128h-34.132812zm0 0"></path>
    </symbol>
    <symbol viewBox="0 0 512 512" id="bedroom">
        <path d="M469.333,138.002V25.6c0-14.114-11.486-25.6-25.6-25.6H68.267c-14.114,0-25.6,11.486-25.6,25.6v112.402
		c-9.931,3.523-17.067,13.009-17.067,24.132v51.2V486.4c0,14.114,11.486,25.6,25.6,25.6h409.6c14.114,0,25.6-11.486,25.6-25.6
		V213.333v-51.2C486.4,151.011,479.265,141.525,469.333,138.002z M59.733,25.6c0-4.71,3.823-8.533,8.533-8.533h375.467
		c4.71,0,8.533,3.823,8.533,8.533v110.933H435.2V51.2c0-9.412-7.654-17.067-17.067-17.067H93.867
		c-9.412,0-17.067,7.654-17.067,17.067v85.333H59.733V25.6z M294.82,136.533c-6.346-17.64-6.202-37.056,0.51-52.762
		c30.174-9.079,61.807-9.105,91.972-0.009c6.721,17.161,6.926,36.592,0.643,52.77H294.82z M402.577,76.015l-1.161-2.637
		c-0.973-2.227-2.859-3.934-5.163-4.685c-35.925-11.742-73.899-11.742-109.841,0c-2.313,0.751-4.198,2.466-5.171,4.702
		l-1.109,2.551c-8.195,18.274-9.297,39.847-3.252,60.587h-33.054c5.688-19.172,4.592-41.08-3.383-60.518l-1.161-2.637
		c-0.973-2.227-2.859-3.934-5.163-4.685c-35.925-11.742-73.899-11.742-109.841,0c-2.313,0.751-4.198,2.466-5.171,4.702
		l-1.109,2.551c-8.195,18.274-9.297,39.847-3.252,60.587h-20.88V51.2h324.267v85.333H405.96
		C411.648,117.361,410.552,95.454,402.577,76.015z M132.686,136.533c-6.346-17.64-6.202-37.056,0.51-52.762
		c30.165-9.079,61.798-9.105,91.972-0.009c6.721,17.161,6.926,36.592,0.643,52.77H132.686z M42.667,162.133
		c0-4.71,3.823-8.533,8.533-8.533h34.133h341.333H460.8c4.71,0,8.533,3.823,8.533,8.533V204.8H42.667V162.133z M469.333,486.4
		c0,4.71-3.823,8.533-8.533,8.533H51.2c-4.71,0-8.533-3.823-8.533-8.533V221.867h426.667V486.4z"></path>
    </symbol>
    <symbol viewBox="0 0 60 60" id="bathroom">
        <path d="M59,57.999H49v-2.246c2.487-0.633,4.533-2.536,5.241-5.087l3.552-12.787c1.268-0.35,2.207-1.502,2.207-2.88
		c0-1.654-1.346-3-3-3V2.416c0-0.979-0.585-1.855-1.49-2.23c-0.905-0.373-1.938-0.169-2.631,0.523l-2.59,2.59
		c-2.258-1.722-5.495-1.575-7.558,0.487c-0.391,0.391-0.391,1.023,0,1.414l7.071,7.071c0.188,0.188,0.442,0.293,0.707,0.293
		s0.52-0.105,0.707-0.293c2.062-2.063,2.209-5.3,0.486-7.558l2.59-2.59c0.17-0.17,0.357-0.128,0.452-0.09
		C54.84,2.073,55,2.175,55,2.416v29.583H24v-2H11v2H3c-1.654,0-3,1.346-3,3c0,1.378,0.939,2.53,2.207,2.88l3.552,12.787
		C6.467,53.217,8.513,55.12,11,55.753v2.246H1c-0.552,0-1,0.447-1,1s0.448,1,1,1h11h3h30h3h11c0.552,0,1-0.447,1-1
		S59.552,57.999,59,57.999z M50.414,10.054l-5.467-5.466c1.437-0.818,3.3-0.612,4.524,0.611l0.331,0.331
		C51.025,6.755,51.229,8.618,50.414,10.054z M57,33.999c0.551,0,1,0.448,1,1s-0.449,1-1,1H24v-2H57z M22,31.999v4v2v5h-9v-5v-2v-4
		H22z M13,44.999h9v2h-9V44.999z M3,33.999h8v2H3c-0.551,0-1-0.448-1-1S2.449,33.999,3,33.999z M7.686,50.131l-3.37-12.132H11v5v6
		h13v-6v-5h31.685l-3.37,12.132c-0.633,2.277-2.726,3.868-5.089,3.868H43H17h-4.226C10.411,53.999,8.318,52.408,7.686,50.131z
		 M42.382,55.999l1,2H16.618l1-2H42.382z M13,57.999v-2h2.382l-1,2H13z M45.618,57.999l-1-2H47v2H45.618z"></path>
        <path d="M47,13.999c0.552,0,1-0.447,1-1v-1c0-0.553-0.448-1-1-1s-1,0.447-1,1v1C46,13.551,46.448,13.999,47,13.999z"></path>
        <path d="M46,20.999c0,0.553,0.448,1,1,1s1-0.447,1-1v-1c0-0.553-0.448-1-1-1s-1,0.447-1,1V20.999z"></path>
        <path d="M46,24.999c0,0.553,0.448,1,1,1s1-0.447,1-1v-1c0-0.553-0.448-1-1-1s-1,0.447-1,1V24.999z"></path>
        <path d="M46,28.999c0,0.553,0.448,1,1,1s1-0.447,1-1v-1c0-0.553-0.448-1-1-1s-1,0.447-1,1V28.999z"></path>
        <path d="M46,16.999c0,0.553,0.448,1,1,1s1-0.447,1-1v-1c0-0.553-0.448-1-1-1s-1,0.447-1,1V16.999z"></path>
        <path d="M37.464,12.534c0.256,0,0.512-0.098,0.707-0.293l0.707-0.707c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
		l-0.707,0.707c-0.391,0.391-0.391,1.023,0,1.414C36.953,12.436,37.208,12.534,37.464,12.534z"></path>
        <path d="M34.636,15.363c0.256,0,0.512-0.098,0.707-0.293l0.707-0.707c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
		l-0.707,0.707c-0.391,0.391-0.391,1.023,0,1.414C34.125,15.265,34.38,15.363,34.636,15.363z"></path>
        <path d="M31.808,18.191c0.256,0,0.512-0.098,0.707-0.293l0.707-0.707c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
		l-0.707,0.707c-0.391,0.391-0.391,1.023,0,1.414C31.296,18.093,31.552,18.191,31.808,18.191z"></path>
        <path d="M40.293,9.706c0.256,0,0.512-0.098,0.707-0.293l0.707-0.707c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
		l-0.707,0.707c-0.391,0.391-0.391,1.023,0,1.414C39.781,9.608,40.037,9.706,40.293,9.706z"></path>
        <path d="M26.151,23.848c0.256,0,0.512-0.098,0.707-0.293l0.707-0.707c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
		l-0.707,0.707c-0.391,0.391-0.391,1.023,0,1.414C25.639,23.751,25.895,23.848,26.151,23.848z"></path>
        <path d="M20.494,29.505c0.256,0,0.512-0.098,0.707-0.293l0.707-0.707c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
		l-0.707,0.707c-0.391,0.391-0.391,1.023,0,1.414C19.982,29.407,20.238,29.505,20.494,29.505z"></path>
        <path d="M28.979,21.019c0.256,0,0.512-0.098,0.707-0.293l0.708-0.707c0.391-0.39,0.391-1.023,0-1.414
		c-0.391-0.391-1.024-0.391-1.415,0l-0.708,0.707c-0.391,0.39-0.391,1.023,0,1.414C28.467,20.922,28.723,21.019,28.979,21.019z"></path>
        <path d="M23.322,26.676c0.256,0,0.512-0.098,0.707-0.293l0.707-0.707c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
		l-0.707,0.707c-0.391,0.391-0.391,1.023,0,1.414C22.811,26.579,23.066,26.676,23.322,26.676z"></path>
        <path d="M39.144,19.74c0.154,0.086,0.32,0.126,0.484,0.126c0.352,0,0.692-0.186,0.875-0.515l0.485-0.874
		c0.269-0.482,0.094-1.092-0.389-1.359c-0.483-0.27-1.091-0.094-1.359,0.389l-0.485,0.874C38.487,18.863,38.661,19.472,39.144,19.74
		z"></path>
        <path d="M41.184,14.009l-0.486,0.874c-0.269,0.483-0.095,1.092,0.388,1.36c0.154,0.086,0.32,0.126,0.485,0.126
		c0.352,0,0.692-0.186,0.875-0.514l0.486-0.874c0.269-0.483,0.095-1.092-0.388-1.36C42.061,13.351,41.451,13.527,41.184,14.009z"></path>
        <path d="M43.028,12.747c0.154,0.086,0.32,0.126,0.485,0.126c0.352,0,0.692-0.186,0.875-0.514l0.486-0.874
		c0.269-0.483,0.095-1.092-0.388-1.36c-0.483-0.27-1.092-0.094-1.36,0.388l-0.486,0.874C42.372,11.87,42.545,12.478,43.028,12.747z"
        ></path>
        <path d="M36.618,26.344l0.485-0.874c0.269-0.482,0.094-1.092-0.389-1.359c-0.484-0.27-1.092-0.094-1.359,0.389l-0.485,0.874
		c-0.269,0.482-0.094,1.092,0.389,1.359c0.154,0.086,0.32,0.126,0.484,0.126C36.095,26.859,36.436,26.674,36.618,26.344z"></path>
        <path d="M38.561,22.849l0.486-0.874c0.269-0.483,0.095-1.092-0.388-1.36c-0.482-0.271-1.092-0.095-1.36,0.388l-0.486,0.874
		c-0.269,0.483-0.095,1.092,0.388,1.36c0.154,0.086,0.32,0.126,0.485,0.126C38.037,23.363,38.378,23.177,38.561,22.849z"></path>
        <path d="M34.773,27.608c-0.483-0.27-1.092-0.094-1.36,0.389l-0.287,0.517c-0.269,0.482-0.095,1.091,0.388,1.359
		c0.154,0.086,0.321,0.126,0.485,0.126c0.352,0,0.692-0.186,0.875-0.515l0.287-0.517C35.43,28.485,35.256,27.877,34.773,27.608z"></path>
    </symbol>
    <symbol viewBox="0 0 60 60" id="condition">
        <path d="M59.4,26.65 L56,25.161 L56,22.49 C56.0039416,21.8709428 55.7165089,21.2860764 55.224,20.911 L28.614,0.211 C28.2528664,-0.0699253009 27.7471336,-0.0699253009 27.386,0.211 L18,7.512 L18,5 C18,3.8954305 17.1045695,3 16,3 L10,3 C8.8954305,3 8,3.8954305 8,5 L8,15.291 L0.785,20.9 C0.286741321,21.2761429 -0.00433889651,21.8657193 4.4408921e-16,22.49 L4.4408921e-16,27.96 C5.79356983e-16,29.0645695 0.8954305,29.96 2,29.96 C2.4445736,29.9601414 2.87593258,29.8088307 3.223,29.531 L6,27.371 L6,57 C6,58.6568542 7.34314575,60 9,60 L44,60 C44.3852231,59.9998286 44.7606229,59.8784272 45.073,59.653 L55.439,52.175 C58.2989808,50.108123 59.9950002,46.7956606 60,43.267 L60,27.567 C60.0001929,27.1692018 59.7645881,26.8091192 59.4,26.65 Z M10,5 L16,5 L16,9.068 L10,13.735 L10,5 Z M2,27.96 L2,22.49 L7.6,18.136 L7.615,18.129 L28,2.267 L48.386,18.129 C48.393,18.129 48.402,18.136 48.409,18.141 L54,22.49 L54,24.29 L44.4,20.09 C44.2169047,20.0160919 44.0156427,19.9996979 43.823,20.043 L28.614,8.21 C28.2528664,7.9290747 27.7471336,7.9290747 27.386,8.21 L2,27.96 Z M8,57 L8,25.816 L28,10.267 L41.7,20.917 L28.6,26.65 C28.2357446,26.808974 28.0002048,27.1685648 28,27.566 L28,36 L21,36 C19.3431458,36 18,37.3431458 18,39 L18,58 L9,58 C8.44771525,58 8,57.5522847 8,57 Z M20,58 L20,39 C20,38.4477153 20.4477153,38 21,38 L28,38 L28,43.267 C28.0049998,46.7956606 29.7010192,50.108123 32.561,52.175 L36,54.656 L36,58 L20,58 Z M40.635,58 L38,58 L38,56.1 L40.635,58 Z M58,43.267 C57.9954196,46.1529088 56.6085528,48.8619467 54.27,50.553 L44,57.961 L33.73,50.553 C31.3914472,48.8619467 30.0045804,46.1529088 30,43.267 L30,28.22 L44,22.092 L58,28.22 L58,43.267 Z"></path>
        <path d="M43.6,24.45 L32.6,29.266 C32.2357446,29.424974 32.0002048,29.7845648 32,30.182 L32,43.267 C32.003086,45.5106532 33.0814764,47.6168612 34.9,48.931 L43.415,55.073 C43.7643066,55.3249556 44.2356934,55.3249556 44.585,55.073 L53.1,48.93 C54.9182384,47.616068 55.9965937,45.5103004 56,43.267 L56,30.182 C55.9997952,29.7845648 55.7642554,29.424974 55.4,29.266 L44.4,24.45 C44.1449495,24.3386869 43.8550505,24.3386869 43.6,24.45 Z M54,30.835 L54,43.267 C53.9979253,44.8680054 53.228082,46.3708736 51.93,47.308 L44,53.029 L36.07,47.309 C34.7726536,46.3707907 34.0030618,44.8680418 34,43.267 L34,30.835 L44,26.458 L54,30.835 Z" ></path>
        <path d="M38.669,40.657 C38.4048368,40.4095273 38.0275609,40.3241282 37.6825746,40.4337156 C37.3375883,40.5433029 37.0787549,40.8307666 37.0058289,41.185318 C36.9329029,41.5398695 37.0572703,41.9061519 37.331,42.143 L41.331,45.743 C41.51459,45.9083772 41.7529071,45.999928 42,46 C42.0418034,46.0002923 42.0835749,45.9976189 42.125,45.992 C42.4129077,45.9558089 42.6708981,45.7963438 42.832,45.555 L50.832,33.555 C51.0302824,33.257755 51.0549246,32.8773069 50.8966441,32.5569669 C50.7383636,32.2366268 50.421207,32.025062 50.0646441,32.0019669 C49.7080812,31.9788718 49.3662824,32.147755 49.168,32.445 L41.81,43.483 L38.669,40.657 Z"></path>
    </symbol>
    <symbol viewBox="0 0 512 512" id="location">
        <path d="m204.5 458.605469v51.855469l-12.539062-10.128907c-1.9375-1.566406-48.035157-38.992187-94.78125-92.660156-64.484376-74.035156-97.179688-140.492187-97.179688-197.519531v-5.652344c0-112.761719 91.738281-204.5 204.5-204.5s204.5 91.738281 204.5 204.5v5.652344c0 4.789062-.253906 9.652344-.714844 14.574218l-39.992187-36.484374c-8.191407-83.15625-78.519531-148.339844-163.792969-148.339844-90.757812 0-164.597656 73.839844-164.597656 164.597656v5.652344c0 96.367187 124.164062 213.027344 164.597656 248.453125zm122.699219-28.660157h59.851562v-59.851562h-59.851562zm-122.699219-310.238281c46.753906 0 84.792969 38.039063 84.792969 84.792969s-38.039063 84.792969-84.792969 84.792969-84.792969-38.039063-84.792969-84.792969 38.039063-84.792969 84.792969-84.792969zm0 39.902344c-24.753906 0-44.890625 20.136719-44.890625 44.890625 0 24.75 20.136719 44.890625 44.890625 44.890625 24.75 0 44.890625-20.140625 44.890625-44.890625 0-24.753906-20.140625-44.890625-44.890625-44.890625zm280.609375 243.222656-11.21875-10.234375v64.058594c0 29.828125-24.269531 54.09375-54.097656 54.09375h-126.332031c-29.828126 0-54.097657-24.265625-54.097657-54.09375v-64.058594l-11.21875 10.234375-26.890625-29.476562 155.371094-141.746094 155.375 141.746094zm-51.121094-46.636719-77.363281-70.574218-77.359375 70.574218v100.457032c0 7.828125 6.367187 14.195312 14.195313 14.195312h126.332031c7.828125 0 14.195312-6.367187 14.195312-14.195312zm0 0"></path>
    </symbol>
    <symbol viewBox="0 0 512 512" id="blank_thumbnail">
        <path d="m332.800781 247.46875c.015625 42.109375 30.746094 77.910156 72.363281 84.308594.171876.085937.257813.085937.339844 0 4.175782.6875 8.398438 1.03125 12.632813 1.027344 4.214843-.03125 8.421875-.378907 12.585937-1.035157-41.511718-6.515625-72.101562-42.28125-72.101562-84.300781s30.589844-77.78125 72.101562-84.300781c-4.164062-.65625-8.371094-1-12.585937-1.03125-4.234375-.003907-8.457031.335937-12.632813 1.023437-.082031-.085937-.167968-.085937-.339844 0-41.617187 6.402344-72.347656 42.203125-72.363281 84.308594zm0 0" fill="#fff" data-original="#FFF" class="" data-old_color="#fff" style="fill:#FFFFFF"></path>
        <path d="m273.066406 51.203125c.070313-9.398437 7.671875-16.996094 17.070313-17.066406h-25.601563c-9.398437.070312-16.996094 7.667969-17.066406 17.066406-.027344 9.414063-7.652344 17.039063-17.066406 17.066406h25.597656c9.414062-.027343 17.039062-7.652343 17.066406-17.066406zm0 0" fill="#fff" data-original="#FFF" class="" data-old_color="#fff" style="fill:#FFFFFF"></path>
        <path d="m196.269531 102.402344h25.597657c-9.414063-.027344-17.039063-7.652344-17.066407-17.066406.070313-9.394532 7.671875-16.996094 17.066407-17.066407h-25.597657c-9.398437.070313-17 7.671875-17.066406 17.066407.027344 9.414062 7.652344 17.039062 17.066406 17.066406zm0 0" fill="#fff" data-original="#FFF" class="" data-old_color="#fff" style="fill:#FFFFFF"></path>
        <path d="m55.46875 401.070312h25.597656c-2.355468 0-4.265625-1.910156-4.265625-4.265624v-144.214844l85.417969-96.425782 2.902344-3.269531-12.96875-14.226562-15.53125 17.496093-85.417969 96.425782v144.214844c0 2.355468 1.910156 4.265624 4.265625 4.265624zm0 0" fill="#fff" data-original="#FFF" class="" data-old_color="#fff" style="fill:#FFFFFF"></path>
        <path d="m256 252.589844v144.214844c0 2.355468-1.910156 4.265624-4.265625 4.265624h-196.265625c-2.355469 0-4.265625-1.910156-4.265625-4.265624v-144.214844l85.417969-96.425782 15.53125-17.496093zm0 0" fill="#e3e7f2" data-original="#E3E7F2" class="" data-old_color="#e3e7f2" style="fill:#FFF9F8"></path>
        <path d="m230.402344 258.988281v142.082031h-174.933594c-2.355469 0-4.265625-1.910156-4.265625-4.265624v-144.214844l85.417969-96.425782zm0 0" fill="#f5f5f5" data-original="#F5F5F5" class="" data-old_color="#f5f5f5" style="fill:#F8F4F4"></path>
        <path d="m85.335938 401.070312v-93.867187c0-9.425781 7.640624-17.066406 17.066406-17.066406h17.066406c9.425781 0 17.066406 7.640625 17.066406 17.066406v93.867187zm0 0" fill="#7fabfa" data-original="#7FABFA" class="" data-old_color="#7fabfa" style="fill:#F7DCD5"></path>
        <path d="m196.269531 179.203125v-17.066406c0-9.425781 7.640625-17.066407 17.066407-17.066407 9.425781 0 17.066406 7.640626 17.066406 17.066407v59.734375zm0 0" fill="#7fabfa" data-original="#7FABFA" class="" data-old_color="#7fabfa" style="fill:#F7DCD5"></path>
        <path d="m503.46875 247.46875c0 47.128906-38.207031 85.335938-85.332031 85.335938-4.234375.003906-8.457031-.339844-12.632813-1.027344-.082031.085937-.167968.085937-.339844 0-41.535156-6.492188-72.152343-42.269532-72.152343-84.308594s30.617187-77.816406 72.152343-84.308594c.171876-.085937.257813-.085937.339844 0 4.175782-.6875 8.398438-1.027344 12.632813-1.023437 47.125 0 85.332031 38.203125 85.332031 85.332031zm0 0" fill="#a4c2f7" data-original="#A4C2F7" class="" data-old_color="#a4c2f7" style="fill:#FAD2C7"></path>
        <path d="m477.867188 247.46875c-.015626 42.109375-30.742188 77.910156-72.363282 84.308594-.082031.085937-.167968.085937-.339844 0-41.535156-6.492188-72.152343-42.269532-72.152343-84.308594s30.617187-77.816406 72.152343-84.308594c.171876-.085937.257813-.085937.339844 0 41.621094 6.402344 72.347656 42.203125 72.363282 84.308594zm0 0" fill="#e3e7f2" data-original="#E3E7F2" class="" data-old_color="#e3e7f2" style="fill:#FFF9F8"></path>
        <path d="m221.867188 315.738281c0 14.136719-11.460938 25.597657-25.597657 25.597657-14.140625 0-25.601562-11.460938-25.601562-25.597657 0-14.140625 11.460937-25.601562 25.601562-25.601562 14.136719 0 25.597657 11.460937 25.597657 25.601562zm0 0" fill="#a4c2f7" data-original="#A4C2F7" class="" data-old_color="#a4c2f7" style="fill:#FAD2C7"></path>
        <path d="m196.269531 315.738281c.003907 9.148438-4.875 17.609375-12.800781 22.183594-7.9375-4.566406-12.828125-13.027344-12.828125-22.183594 0-9.160156 4.890625-17.621093 12.828125-22.1875 7.925781 4.574219 12.804688 13.035157 12.800781 22.1875zm0 0" fill="#e3e7f2" data-original="#E3E7F2" class="" data-old_color="#e3e7f2" style="fill:#FFF9F8"></path>
        <path d="m443.734375 59.738281c0 28.273438-22.921875 51.199219-51.199219 51.199219-4.324218 0-8.628906-.574219-12.800781-1.707031-19.53125-5.023438-34.277344-21.074219-37.632813-40.960938l6.144532-34.132812c6.859375-11.890625 18.203125-20.53125 31.488281-23.980469 4.183594-1.0625 8.484375-1.605469 12.800781-1.621094 28.277344 0 51.199219 22.925782 51.199219 51.203125zm0 0" fill="#a4c2f7" data-original="#A4C2F7" class="" data-old_color="#a4c2f7" style="fill:#FAD2C7"></path>
        <path d="m418.136719 59.738281c-.039063 23.316407-15.824219 43.664063-38.402344 49.492188-19.53125-5.023438-34.277344-21.074219-37.632813-40.960938l6.144532-34.132812c6.859375-11.890625 18.203125-20.53125 31.488281-23.980469 22.574219 5.890625 38.34375 26.25 38.402344 49.582031zm0 0" fill="#e3e7f2" data-original="#E3E7F2" class="" data-old_color="#e3e7f2" style="fill:#FFF9F8"></path>
        <path d="m409.601562 51.203125c-.027343 9.414063-7.652343 17.039063-17.066406 17.066406h-68.265625c-9.414062.027344-17.039062 7.652344-17.066406 17.066407-.070313 9.398437-7.671875 16.996093-17.066406 17.066406h-93.867188c-9.414062-.027344-17.039062-7.652344-17.066406-17.066406.066406-9.394532 7.667969-16.996094 17.066406-17.066407h34.132813c9.414062-.027343 17.039062-7.652343 17.066406-17.066406.070312-9.398437 7.667969-16.996094 17.066406-17.066406h128c9.414063.027343 17.039063 7.652343 17.066406 17.066406zm0 0" fill="#e3e7f2" data-original="#E3E7F2" class="" data-old_color="#e3e7f2" style="fill:#FFF9F8"></path>
        <path d="m392.535156 34.136719c-.027344 9.414062-7.652344 17.039062-17.066406 17.066406h-68.265625c-9.414063.027344-17.039063 7.652344-17.066406 17.066406-.070313 9.398438-7.671875 16.996094-17.070313 17.066407h-93.863281c.066406-9.394532 7.667969-16.996094 17.066406-17.066407h34.132813c9.414062-.027343 17.039062-7.652343 17.066406-17.066406.070312-9.398437 7.667969-16.996094 17.066406-17.066406zm0 0" fill="#f5f5f5" data-original="#F5F5F5" class="" data-old_color="#f5f5f5" style="fill:#F8F4F4"></path>
        <path d="m88.320312 210.519531c3.335938 2.992188 3.820313 8.039063 1.109376 11.605469l-.339844.425781-23.210938 26.285157-11.265625 12.800781-12.796875-11.265625 34.472656-39.082032c3.125-3.503906 8.488282-3.847656 12.03125-.769531zm0 0" fill="#fff" data-original="#FFF" class="" data-old_color="#fff" style="fill:#FFFFFF"></path>
        <path d="m113.496094 189.1875.253906 1.621094c.0625 2.078125-.566406 4.121094-1.792969 5.800781l-.679687.769531c-1.511719 1.453125-3.464844 2.355469-5.546875 2.558594-2.253907.050781-4.441407-.742188-6.144531-2.21875-.839844-.726562-1.507813-1.628906-1.964844-2.644531-.515625-.980469-.835938-2.050781-.9375-3.15625-.070313-2.160157.625-4.277344 1.964844-5.972657.753906-.945312 1.71875-1.703124 2.8125-2.21875 1.03125-.46875 2.125-.785156 3.246093-.941406 2.242188-.089844 4.4375.671875 6.140625 2.136719.429688.339844.769532.851563 1.195313 1.277344.335937.421875.621093.882812.855469 1.367187.25.519532.449218 1.0625.597656 1.621094zm0 0" fill="#fff" data-original="#FFF" class="" data-old_color="#fff" style="fill:#FFFFFF"></path>
        <path d="m156.757812 145.835938-22.527343 25.601562-.339844.339844c0 .085937-.085937.085937-.171875.085937-3.242188 2.945313-8.183594 2.960938-11.441406.035157-3.257813-2.929688-3.773438-7.847657-1.1875-11.382813l.253906-.257813 22.699219-25.769531zm0 0" fill="#fff" data-original="#FFF" class="" data-old_color="#fff" style="fill:#FFFFFF"></path>
        <path d="m99.585938 197.71875c1.703124 1.476562 3.890624 2.269531 6.144531 2.21875 2.082031-.203125 4.035156-1.105469 5.546875-2.558594l.679687-.769531c1.226563-1.679687 1.855469-3.722656 1.792969-5.800781l-.253906-1.621094c-.148438-.558594-.347656-1.101562-.597656-1.621094-.234376-.484375-.519532-.945312-.855469-1.367187-.425781-.425781-.765625-.9375-1.195313-1.277344-1.703125-1.464844-3.898437-2.226563-6.140625-2.136719-1.121093.15625-2.214843.472656-3.246093.941406-1.09375.515626-2.058594 1.273438-2.8125 2.21875-1.339844 1.695313-2.035157 3.8125-1.964844 5.972657.101562 1.105469.421875 2.175781.9375 3.15625.457031 1.015625 1.125 1.917969 1.964844 2.644531zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m8.535156 409.601562h8.53125c4.714844 0 8.535156-3.820312 8.535156-8.53125 0-4.714843-3.820312-8.535156-8.535156-8.535156h-8.53125c-4.714844 0-8.535156 3.820313-8.535156 8.535156 0 4.710938 3.820312 8.53125 8.535156 8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m512 247.46875c.027344-50.738281-40.273438-92.3125-90.984375-93.867188-50.714844-1.558593-93.488281 37.46875-96.574219 88.113282-3.085937 50.644531 34.632813 94.574218 85.160156 99.1875v51.632812h-145.066406v-117.375l10.667969 12.09375c2.015625 2.285156 5.101563 3.320313 8.089844 2.714844 2.988281-.601562 5.429687-2.757812 6.402343-5.648438.96875-2.890624.324219-6.078124-1.695312-8.367187l-49.066406-55.601563v-58.214843c0-14.140625-11.460938-25.601563-25.597656-25.601563-14.140626 0-25.601563 11.460938-25.601563 25.601563v.1875l-24.53125-27.808594c-2.5-2.636719-5.96875-4.128906-9.601563-4.128906-3.632812 0-7.101562 1.492187-9.601562 4.128906v.058594l-22.65625 25.683593-.253906.257813c-2.585938 3.535156-2.070313 8.453125 1.1875 11.382813 3.257812 2.925781 8.199218 2.910156 11.441406-.035157.085938 0 .171875 0 .171875-.085937l.339844-.339844 19.371093-21.964844 93.867188 106.34375v136.71875h-102.402344v-85.332031c0-14.136719-11.460937-25.601563-25.597656-25.601563h-17.066406c-14.140625 0-25.601563 11.464844-25.601563 25.601563v85.332031h-17.066406v-136.71875l6.144531-6.980468 23.210938-26.285157.339844-.425781c2.644531-3.648438 2-8.722656-1.476563-11.589844-3.476563-2.867187-8.585937-2.539062-11.664063.753906l-31.0625 35.25-.066406.078126-3.3125 3.753906-22.613281 25.601562c-1.511719 1.6875-2.285156 3.914063-2.140625 6.175782.144531 2.261718 1.195312 4.371093 2.910156 5.855468 3.535156 3.105469 8.917969 2.761719 12.03125-.769531l10.632813-12.074219v125.910156c0 4.710938 3.820312 8.53125 8.535156 8.53125h452.265625c4.710938 0 8.53125-3.820312 8.53125-8.53125 0-4.714843-3.820312-8.535156-8.53125-8.535156h-76.800781v-51.632812c48.296875-4.449219 85.269531-44.929688 85.332031-93.433594zm-307.199219-68.265625v-17.066406c0-4.714844 3.820313-8.535157 8.535157-8.535157 4.710937 0 8.53125 3.820313 8.53125 8.535157v38.867187l-17.464844-19.796875c.214844-.648437.347656-1.320312.398437-2.003906zm-110.933593 128c0-4.714844 3.820312-8.535156 8.535156-8.535156h17.066406c4.710938 0 8.53125 3.820312 8.53125 8.535156v85.332031h-34.132812zm247.46875-59.734375c-.015626-41.308594 32.648437-75.230469 73.929687-76.773438 41.28125-1.542968 76.386719 29.847657 79.457031 71.042969 3.070313 41.195313-27 77.4375-68.054687 82.027344v-28.800781l38.527343-23.117188c3.945313-2.464844 5.183594-7.640625 2.789063-11.628906-2.398437-3.988281-7.546875-5.320312-11.578125-2.996094l-29.738281 17.84375v-15.53125l31.632812-31.632812c3.234375-3.347656 3.1875-8.671875-.101562-11.960938-3.292969-3.292968-8.617188-3.339844-11.964844-.105468l-28.097656 28.101562-28.101563-28.101562c-3.347656-3.234376-8.671875-3.1875-11.960937.105468-3.292969 3.289063-3.339844 8.613282-.105469 11.960938l31.632812 31.632812v15.53125l-29.738281-17.84375c-4.03125-2.324218-9.179687-.992187-11.578125 2.996094-2.394531 3.988281-1.15625 9.164062 2.789063 11.628906l38.527343 23.117188v28.800781c-38.839843-4.382813-68.210937-37.210937-68.265624-76.296875zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m230.402344 315.738281c0-18.851562-15.28125-34.136719-34.132813-34.136719-18.851562 0-34.132812 15.285157-34.132812 34.136719 0 18.847657 15.28125 34.132813 34.132812 34.132813 18.851563 0 34.132813-15.285156 34.132813-34.132813zm-51.199219 0c0-9.425781 7.640625-17.070312 17.066406-17.070312s17.066407 7.644531 17.066407 17.070312c0 9.421875-7.640626 17.066407-17.066407 17.066407s-17.066406-7.644532-17.066406-17.066407zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m196.269531 110.9375h93.867188c14.136719 0 25.597656-11.460938 25.597656-25.601562 0-4.710938 3.820313-8.53125 8.535156-8.53125h11.09375c7.898438 26.800781 33.285157 44.570312 61.171875 42.824218 27.886719-1.75 50.855469-22.554687 55.34375-50.132812 4.492188-27.578125-10.691406-54.59375-36.582031-65.097656-25.890625-10.503907-55.605469-1.707032-71.597656 21.203124h-79.164063c-14.140625 0-25.601562 11.464844-25.601562 25.601563 0 4.710937-3.820313 8.535156-8.53125 8.535156h-34.132813c-14.140625 0-25.601562 11.460938-25.601562 25.597657 0 14.140624 11.460937 25.601562 25.601562 25.601562zm196.265625-93.867188c23.5625 0 42.667969 19.101563 42.667969 42.667969 0 23.5625-19.105469 42.664063-42.667969 42.664063-16.933594.03125-32.253906-10.039063-38.9375-25.597656h38.9375c14.136719 0 25.601563-11.464844 25.601563-25.601563s-11.464844-25.601563-25.601563-25.601563h-25.507812c7.359375-5.519531 16.308594-8.511718 25.507812-8.53125zm-196.265625 59.734376h34.132813c14.136718 0 25.597656-11.464844 25.597656-25.601563 0-4.714844 3.820312-8.535156 8.535156-8.535156h128c4.710938 0 8.53125 3.820312 8.53125 8.535156 0 4.710937-3.820312 8.535156-8.53125 8.535156h-68.265625c-14.140625 0-25.601562 11.460938-25.601562 25.597657 0 4.714843-3.820313 8.535156-8.53125 8.535156h-93.867188c-4.714843 0-8.535156-3.820313-8.535156-8.535156 0-4.710938 3.820313-8.53125 8.535156-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m68.269531 443.738281h-17.066406c-4.714844 0-8.535156 3.820313-8.535156 8.53125 0 4.714844 3.820312 8.535157 8.535156 8.535157h17.066406c4.710938 0 8.53125-3.820313 8.53125-8.535157 0-4.710937-3.820312-8.53125-8.53125-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m119.46875 460.804688c4.710938 0 8.53125-3.820313 8.53125-8.535157 0-4.710937-3.820312-8.53125-8.53125-8.53125h-17.066406c-4.714844 0-8.535156 3.820313-8.535156 8.53125 0 4.714844 3.820312 8.535157 8.535156 8.535157zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m170.667969 460.804688c4.714843 0 8.535156-3.820313 8.535156-8.535157 0-4.710937-3.820313-8.53125-8.535156-8.53125h-17.066407c-4.710937 0-8.535156 3.820313-8.535156 8.53125 0 4.714844 3.824219 8.535157 8.535156 8.535157zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m221.867188 443.738281h-17.066407c-4.710937 0-8.53125 3.820313-8.53125 8.53125 0 4.714844 3.820313 8.535157 8.53125 8.535157h17.066407c4.714843 0 8.535156-3.820313 8.535156-8.535157 0-4.710937-3.820313-8.53125-8.535156-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m375.46875 443.738281h-17.066406c-4.714844 0-8.535156 3.820313-8.535156 8.53125 0 4.714844 3.820312 8.535157 8.535156 8.535157h17.066406c4.710938 0 8.53125-3.820313 8.53125-8.535157 0-4.710937-3.820312-8.53125-8.53125-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m426.667969 443.738281h-17.066407c-4.710937 0-8.535156 3.820313-8.535156 8.53125 0 4.714844 3.824219 8.535157 8.535156 8.535157h17.066407c4.714843 0 8.535156-3.820313 8.535156-8.535157 0-4.710937-3.820313-8.53125-8.535156-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m477.867188 460.804688c4.714843 0 8.535156-3.820313 8.535156-8.535157 0-4.710937-3.820313-8.53125-8.535156-8.53125h-17.066407c-4.710937 0-8.53125 3.820313-8.53125 8.53125 0 4.714844 3.820313 8.535157 8.53125 8.535157zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m25.601562 494.9375c-4.710937 0-8.535156 3.820312-8.535156 8.53125 0 4.714844 3.824219 8.535156 8.535156 8.535156h17.066407c4.714843 0 8.535156-3.820312 8.535156-8.535156 0-4.710938-3.820313-8.53125-8.535156-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m76.800781 494.9375c-4.710937 0-8.53125 3.820312-8.53125 8.53125 0 4.714844 3.820313 8.535156 8.53125 8.535156h17.066407c4.714843 0 8.535156-3.820312 8.535156-8.535156 0-4.710938-3.820313-8.53125-8.535156-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m221.867188 503.46875c0 4.714844 3.820312 8.535156 8.535156 8.535156h17.066406c4.710938 0 8.53125-3.820312 8.53125-8.535156 0-4.710938-3.820312-8.53125-8.53125-8.53125h-17.066406c-4.714844 0-8.535156 3.820312-8.535156 8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m298.667969 512.003906c4.714843 0 8.535156-3.820312 8.535156-8.535156 0-4.710938-3.820313-8.53125-8.535156-8.53125h-17.066407c-4.710937 0-8.535156 3.820312-8.535156 8.53125 0 4.714844 3.824219 8.535156 8.535156 8.535156zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m332.800781 494.9375c-4.710937 0-8.53125 3.820312-8.53125 8.53125 0 4.714844 3.820313 8.535156 8.53125 8.535156h17.066407c4.714843 0 8.535156-3.820312 8.535156-8.535156 0-4.710938-3.820313-8.53125-8.535156-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m384 494.9375c-4.710938 0-8.53125 3.820312-8.53125 8.53125 0 4.714844 3.820312 8.535156 8.53125 8.535156h17.066406c4.714844 0 8.535156-3.820312 8.535156-8.535156 0-4.710938-3.820312-8.53125-8.535156-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>
        <path d="m435.203125 494.9375c-4.714844 0-8.535156 3.820312-8.535156 8.53125 0 4.714844 3.820312 8.535156 8.535156 8.535156h17.066406c4.710938 0 8.53125-3.820312 8.53125-8.535156 0-4.710938-3.820312-8.53125-8.53125-8.53125zm0 0" data-original="#000000" class="active-path" style="fill:#672533" data-old_color="#000000"></path>

    </symbol>
</svg>
<?php wp_footer(); ?>

</body>

</html>

