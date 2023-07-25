<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">
	<h1 class="order-received section-title"><?php echo pll__('Order Received') ?></h1>
	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<div class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<table class="table table-order-received">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Order number', 'woocommerce' ); ?></th>
							<th><?php esc_html_e( 'Date', 'woocommerce' ); ?></th>
							<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
							<th><?php esc_html_e( 'Payment method', 'woocommerce' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td data-title="<?php esc_html_e( 'Order number', 'woocommerce' ); ?>">
								<?php echo $order->get_order_number();?>
							</td>
							<td data-title="<?php esc_html_e( 'Date', 'woocommerce' ); ?>">
								<?php echo wc_format_datetime( $order->get_date_created() );?>
							</td>
							<td data-title="<?php esc_html_e( 'Total', 'woocommerce' ); ?>">
								<?php echo $order->get_formatted_order_total();?>
							</td>
							<td data-title="<?php esc_html_e( 'Payment method', 'woocommerce' ); ?>">
								<?php if ( $order->get_payment_method_title() ) : ?>
									<?php echo wp_kses_post( $order->get_payment_method_title() ); ?>
								<?php endif; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
