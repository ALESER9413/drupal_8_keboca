<?php

	namespace Drupal\Timer\Controller;

	use Drupal\Core\Controller\ControllerBase;

	/**
	 * An example class controller.
	 */

	// extends ControllerBase 
	class TimerController extends ControllerBase {

		/**
		* An example method.
		*/
		public function index() {

			$place_one_datetime = $this->api_url("America/Costa_Rica");
			$place_two_datetime = $this->api_url("America/New_York");
			$place_three_datetime = $this->api_url("Europe/Belgrade");

			return [
				'#markup' => $this->t('<table style="width:100%">
				<tr>
				  <th>Place</th>
				  <th>Date</th>
				</tr>
				<tr>
				  <td>San Jose, CR</td>
				  <td>'. $this->format_date( $place_one_datetime->datetime ) .'</td>
				</tr>
				<tr>
				  <td>New York, USA</td>
				  <td>'. $this->format_date( $place_two_datetime->datetime ) .'</td>
				</tr>
				<tr>
				  <td>Belgrado, Serbia</td>
				  <td>'. $this->format_date( $place_three_datetime->datetime ) .'</td>
				</tr>
			  </table>'),
			];
		}

		private function api_url( $place ){

			$response = file_get_contents( 'http://worldtimeapi.org/api/timezone/' . $place );
			
			return json_decode($response);

		}

		private function format_date( $datetime ){

			$date = date_create($datetime);
			
			return date_format($date,"Y-m-d H:i:s");
		}
	}
	 
	?>