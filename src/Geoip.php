<?php

namespace Sabartampubolon\Geoip;

class Geoip {
	/**
	 * @var clientIP
	 */
	protected $clientIP;
	/**
	 * GeoIp constructor.
	 *
	 * Preparing User Ip Address
	 *
	 * Use connected Ip if Ip Address not provide by user
	 *
	 * @param string $clientIP Ip Client
	 */
	public function __construct($clientIP = ''){
		if ($clientIP):
			$this->clientIP = $clientIP;
		else:
			$this->clientIP = $this->getIpAddress();
		endif;
	}

	/**
	 * Get Clien IP
	 *
	 * Return Connected IP Address
	 *
	 * @return string $clientIP Ip Client
	 */
	public function getClientIP(){
		return $this->clientIP;
	}

	/**
	 * Get Info
	 *
	 * Get information from ip client
	 *
	 * User http://www.geoplugin.net to extract the data from ip client
	 * Data return from site geoplugin_request, geoplugin_status, geoplugin_credit, geoplugin_city, geoplugin_region, geoplugin_areaCode, geoplugin_dmaCode, geoplugin_countryCode, geoplugin_countryName, geoplugin_continentCode, geoplugin_latitude, geoplugin_longitude, geoplugin_regionCode, geoplugin_regionName, geoplugin_currencyCode, geoplugin_currencySymbol, geoplugin_currencySymbol_UTF8, geoplugin_currencyConverter
	 *
	 * @return json $information Ip Client Information 
	 */
	public function getInfo(){
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=" . $this->getClientIP()));

		if ($geo['geoplugin_status'] != 200):
			return null;
		endif;

		$information = array();
		$information['ip_address'] 		= $geo['geoplugin_request'];

		// Country and region definition global
		// https://github.com/maxmind/geoip-api-php/blob/master/src/geoipregionvars.php
		$information['country_code'] 	= $geo['geoplugin_countryCode'];
		$information['country_name'] 	= $geo['geoplugin_countryName'];

		$information['city'] 			= $geo['geoplugin_city'];
		$information['region'] 			= $geo['geoplugin_region'];

		$information['region_name'] 	= $geo['geoplugin_regionName'];
		$information['region_code'] 	= $geo['geoplugin_regionCode'];

		$information['latitude'] 		= $geo['geoplugin_latitude'];
		$information['longitude'] 		= $geo['geoplugin_longitude'];

		return json_encode($information);
	}

	/**
	 * Helper function to get client IP Address
	 * NOTE: There is security implications
	 * @source http://roshanbh.com.np/2007/12/getting-real-ip-address-in-php.html
	 *
	 * @return string $ip IP Address
	 */
	private function getIpAddress() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])): 			// Check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):	// To check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else:
			$ip = $_SERVER['REMOTE_ADDR'];
		endif;

		return $ip;
	}
}