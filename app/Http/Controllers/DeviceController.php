<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    protected $baseUrl = 'https://api.partner.sparqfi.com/api/v1';
    public function searchDevice()
    {
        return view('device.index');
    }

    public function deviceDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'serial_number' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput($request->all());
        }
        try {
            $client = new Client();
            $guzzleRequest = $client->post($this->baseUrl . '/devices', [
                'headers' => $this->getHeaders(),
                'json' => [
                    'q' => $request->serial_number,
                ]
            ]);
            if ($guzzleRequest->getStatusCode() == Helpers::SUCCESS_STATUS_CODE) {
                $device = json_decode($guzzleRequest->getBody(), true);
                if (count($device['items']) > 0) {
                    $deviceCollection = collect($device['items'])->first();
                    $deviceInfoArray = $this->getDeviceInfo($deviceCollection['uuid']);
                    $deviceInfo = json_decode(json_encode($deviceInfoArray));
                    return view('device.device-detail', compact('deviceInfo'));
                }
            }
            return redirect()->back()->with('error', 'No Record Found');
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
            $errorMessage = $response['detail'] ?? 'An error occurred';
            return redirect()->back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getDeviceInfo($uuid)
    {
        try {
            $client = new Client();
            $guzzleRequest = $client->get($this->baseUrl . '/device/' . $uuid . '/info', [
                'headers' => $this->getHeaders(),
            ]);
            if ($guzzleRequest->getStatusCode() == Helpers::SUCCESS_STATUS_CODE) {
                return json_decode($guzzleRequest->getBody(), true);
            }
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
            $errorMessage = $response['detail'] ?? 'An error occurred';
            return redirect()->back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    protected function getHeaders()
    {
        return
            [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
                'x-api-key' => config('apikey.device_api_key'),
            ];
    }
}
