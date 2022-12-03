@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sensors Configuration</h3>
        </div>
        <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Configuration</h4>
                    <div class="card-header-form">
                    <div class="text-right" style="margin-bottom:15px;">
                          <!-- <a href="javascript:void(0)" class="btn btn-success my-2 my-sm-0" id="btn-new"><span class="fa fa-plus"></span></a> -->
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                      <ul class="nav nav-tabs" id="myTab5" role="tablist">
                        <li class="nav-pills">
                          <a class="nav-link active text-center" style="width:160px;" id="temperatureNavBtn" data-toggle="tab" href="#temperaturetab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-temperature-high text-danger"></i> Temperature</a>
                        </li>
                        <li class="nav-pills">
                          <a class="nav-link text-center" id="lightsNavBtn" style="width:160px; " data-toggle="tab" href="#lighttab" role="tab" aria-controls="profile" aria-selected="false">
                          <i class="fas fa-lightbulb-on text-warning"></i> Light</a>
                        </li>
                        <li class="nav-pills">
                          <a class="nav-link text-center" id="co2NavBtn" style="width:160px;" data-toggle="tab" href="#co2tab" role="tab" aria-controls="contact" aria-selected="false">
                          <i class="fas fa-sensor-smoke" style="color: #61d49e;"></i> Carbon Dioxide</a>
                        </li>
                        <li class="nav-pills">
                          <a class="nav-link text-center" id="humidityNavBtn" style="width:160px;" data-toggle="tab" href="#humiditytab" role="tab" aria-controls="contact" aria-selected="false">
                          <i class="fas fa-humidity text-success"></i> Humidity</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent5">
                        <div class="tab-pane fade show active" id="temperaturetab" role="tabpanel" aria-labelledby="temperatureNavBtn">
                        <section class="section">
                          <div class="section-body">
                            <h2 class="section-title">Temperature Setting</h2>
                            <p class="section-lead">
                              Configure Setting about Temperature Sensor.
                            </p>

                            <div class="row mt-sm-4">
                              <div class="col-12 col-md-12 col-lg-5">
                                <div class="card profile-widget">
                                  <div class="profile-widget-header">
                                    <img alt="image" src="../img/sensors/dht.jpg" class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                      <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Current Temperature</div>
                                        <div class="profile-widget-item-value" id="currentTemp"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="profile-widget-description">
                                    <div class="profile-widget-name">DHT 11</div>
                                    The DHT11 is a basic, ultra low-cost digital temperature and humidity sensor. It uses a capacitive humidity sensor and a thermistor to measure the surrounding air and spits out a digital signal on the data pin (no analog input pins needed). It's fairly simple to use but requires careful timing to grab data.
                                  </div> -->
                                </div>
                              </div>
                              <div class="col-12 col-md-12 col-lg-7">
                                <div class="card">
                                  @include('sensors_configuration/temperatureSetting')
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        </div>
                        <div class="tab-pane fade" id="lighttab" role="tabpanel" aria-labelledby="lightsNavBtn">
                        <section class="section">
                          <div class="section-body">
                            <h2 class="section-title">Light Sensor Setting</h2>
                            <p class="section-lead">
                              Configure Setting about Light Sensor.
                            </p>

                            <div class="row mt-sm-4">
                              <div class="col-12 col-md-12 col-lg-5">
                                <div class="card profile-widget">
                                  <div class="profile-widget-header">
                                    <img alt="image" src="../img/sensors/dht.jpg" class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                      <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Current Light</div>
                                        <div class="profile-widget-item-value" id="currentLight"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="profile-widget-description">
                                    <div class="profile-widget-name">DHT 11</div>
                                    The DHT11 is a basic, ultra low-cost digital temperature and humidity sensor. It uses a capacitive humidity sensor and a thermistor to measure the surrounding air and spits out a digital signal on the data pin (no analog input pins needed). It's fairly simple to use but requires careful timing to grab data.
                                  </div> -->
                                </div>
                              </div>
                              <div class="col-12 col-md-12 col-lg-7">
                                <div class="card">
                                  @include('sensors_configuration/lightSetting')
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        </div>
                        <div class="tab-pane fade" id="co2tab" role="tabpanel" aria-labelledby="co2NavBtn">
                        <section class="section">
                          <div class="section-body">
                            <h2 class="section-title">Light Sensor Setting</h2>
                            <p class="section-lead">
                              Configure Setting about Light Sensor.
                            </p>

                            <div class="row mt-sm-4">
                              <div class="col-12 col-md-12 col-lg-5">
                                <div class="card profile-widget">
                                  <div class="profile-widget-header">
                                    <img alt="image" src="../img/sensors/dht.jpg" class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                      <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Current Light</div>
                                        <div class="profile-widget-item-value" id="currentCo2"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="profile-widget-description">
                                    <div class="profile-widget-name">DHT 11</div>
                                    The DHT11 is a basic, ultra low-cost digital temperature and humidity sensor. It uses a capacitive humidity sensor and a thermistor to measure the surrounding air and spits out a digital signal on the data pin (no analog input pins needed). It's fairly simple to use but requires careful timing to grab data.
                                  </div> -->
                                </div>
                              </div>
                              <div class="col-12 col-md-12 col-lg-7">
                                <div class="card">
                                  @include('sensors_configuration/co2Setting')
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        </div>
                        <div class="tab-pane fade" id="humiditytab" role="tabpanel" aria-labelledby="humidityNavBtn">
                        <section class="section">
                          <div class="section-body">
                            <h2 class="section-title">Light Sensor Setting</h2>
                            <p class="section-lead">
                              Configure Setting about Light Sensor.
                            </p>

                            <div class="row mt-sm-4">
                              <div class="col-12 col-md-12 col-lg-5">
                                <div class="card profile-widget">
                                  <div class="profile-widget-header">
                                    <img alt="image" src="../img/sensors/dht.jpg" class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                      <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Current Light</div>
                                        <div class="profile-widget-item-value" id="currentHumidity"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="profile-widget-description">
                                    <div class="profile-widget-name">DHT 11</div>
                                    The DHT11 is a basic, ultra low-cost digital temperature and humidity sensor. It uses a capacitive humidity sensor and a thermistor to measure the surrounding air and spits out a digital signal on the data pin (no analog input pins needed). It's fairly simple to use but requires careful timing to grab data.
                                  </div> -->
                                </div>
                              </div>
                              <div class="col-12 col-md-12 col-lg-7">
                                <div class="card">
                                  @include('sensors_configuration/humiditySetting')
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/sensors_configuration/index.js') }}"></script>
@endsection

