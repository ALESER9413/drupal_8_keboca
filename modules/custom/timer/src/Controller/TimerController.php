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
				'#markup' => $this->t(' 
				<table style="width:100%">
				<tr>
				  <th>Place</th>
				  <th>Date</th>
				</tr>
				<tr>
				  <td>San Jose, CR</td>
				  <td id="td_sj">'. $this->format_date( $place_one_datetime->datetime ) .'</td>
				</tr>
				<tr>
				  <td>New York, USA</td>
				  <td id="td_ny">'. $this->format_date( $place_two_datetime->datetime ) .'</td>
				</tr>
				<tr>
				  <td>Belgrado, Serbia</td>
				  <td id="td_blg">'. $this->format_date( $place_three_datetime->datetime ) .'</td>
				</tr>
			  </table>'),
			];
		}

		private function api_url( $place ){

			$url = 'https://worldtimeapi.org/api/timezone/' . $place;

			//  Initiate curl
			$ch = curl_init();
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$result=curl_exec($ch);
			// Closing
			curl_close($ch);

			return json_decode($result);

		}

		private function format_date( $datetime ){

			$date = date_create($datetime);
			
			return date_format($date,"Y-m-d H:i:s");
		}
	}
	 
	?>