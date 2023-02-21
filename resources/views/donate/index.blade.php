@extends('layouts.public')

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('images/12.jpg');">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">
                    <h1>Campaign</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li class="breadcrumb-item"><a href="index.html">Home &nbsp;</a></li><li class="breadcrumb-item">Campaign</li> </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- sidebar-page-container -->
    <section class="portlet" id="portlet_search_WAR_givingsgportlet">
        <div class="portlet-content"> <div class=" portlet-content-container" style="">
                <div class="portlet-body">
                    <main class=" pad search-result">
                        <input type="hidden" value="volunteer" id="searchType" />
                        <input type="hidden" value="" id="searchText" />
                        <input type="hidden" value="" id="lastUrl" />
                        <input type="hidden" value="" id="lastKeyword" />
                        <input type="hidden" value="DISTANCE" id="locationActiveTabs" />


                        <div class="pad-navbar search-result__body ctn-1200">
                            <div class="search-result__aside"> <!-- show btn -->
                                <div class="search-result__aside-head">
                                    <div class="flag-obj flag-obj--full"> <div class="flag-obj__item">
                                            <span class="body-txt font-mid-grey">Filter By</span> </div>
                                        <div class="flag-obj__item text-right"> <a class="text-link disabled body-txt--smaller bold js-clear-filters js-clear-filters-btn">CLEAR ALL</a> </div> </div> </div>

                                <div class="res-ctn search-result__mobile-menu" id="js-res-ctn--filter"> <div class="res-ctn__bd lock-body">
                                        <div class="hide-desktop-up">
                                            <div class="flag-obj flag-obj--full">
                                                <div class="flag-obj__item bold font-black">Filters</div>
                                                <div class="flag-obj__item text-right"> <a class="res-ctn-hide-btn button button--ghost" data-toggle="res-ctn-hide" data-target="js-res-ctn--filter"> DONE </a> </div> </div> </div>
                                        <div class="search-result__banner "> <a class="h6 js-clear-filters js-clear-filters-btn text-link text-link--white text-link--no-underline">CLEAR ALL</a> </div>
                                        <div class="title-ctn is-expanded mt-12" data-role="accr reveal-content" data-group="type" data-tag="allType donate volunteer organisation">
                                            <div class="title-ctn__head" data-role="accr__head"> CATEGORIES <i class="ico ico-chevron-up title-ctn__icon"></i> </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible categoriesFilter">
                                                <div class="radio-filters title-ctn__child searchTypeFilter " data-group="type" data-role="reveal-content" data-tag="allType donate"> <label class="radio-filters__lbl">
                                                        <input type="radio" class="radio-filters__radio callSearch categoriesType" name="categories" data-role="radio-show-hide"
                                                               data-target="charities"> <span class="radio-filters__text-left">Charities</span>
                                                        <span class="radio-filters__text-right  " id="charityAmount">0</span>
                                                    </label>
                                                </div>
                                                <div class="radio-filters title-ctn__child searchTypeFilter "
                                                     data-group="type" data-role="reveal-content"
                                                     data-tag="allType organisation">
                                                    <label class="radio-filters__lbl"> <input type="radio"
                                                                                              name="categories" data-role="radio-show-hide"
                                                                                              class="radio-filters__radio callSearch categoriesType"
                                                                                              data-target="groundUp"> <span
                                                                class="radio-filters__text-left">Ground Up Movements</span> <span
                                                                class="radio-filters__text-right" id="gumAmount">0</span>
                                                    </label>
                                                </div>
                                                <div class="radio-filters title-ctn__child searchTypeFilter"
                                                     data-group="type" data-role="reveal-content"
                                                     data-tag="allType organisation">
                                                    <label class="radio-filters__lbl"> <input type="radio"
                                                                                              name="categories" data-role="radio-show-hide"
                                                                                              class="radio-filters__radio callSearch categoriesType"
                                                                                              data-target="corporates"> <span
                                                                class="radio-filters__text-left">Corporates &amp; Other
									Organisations</span> <span class="radio-filters__text-right"
                                                               id="corporatesAmount">0</span>
                                                    </label>
                                                </div>
                                                <div class="radio-filters title-ctn__child searchTypeFilter "
                                                     data-group="type" data-role="reveal-content"
                                                     data-tag="allType donate">
                                                    <label class="radio-filters__lbl"> <input type="radio"
                                                                                              name="categories" data-role="radio-show-hide"
                                                                                              class="radio-filters__radio callSearch categoriesType"
                                                                                              data-target="campaign"> <span
                                                                class="radio-filters__text-left">Campaigns</span> <span
                                                                class="radio-filters__text-right" id="campaignAmount">0</span>
                                                    </label>
                                                </div>
                                                <div class="radio-filters title-ctn__child searchTypeFilter"
                                                     data-role="reveal-content" data-tag="allType volunteer"
                                                     data-group="type">
                                                    <label class="radio-filters__lbl"> <input type="radio"
                                                                                              name="categories" data-role="radio-show-hide"
                                                                                              class="radio-filters__radio callSearch categoriesType"
                                                                                              data-target="adHoc"> <span
                                                                class="radio-filters__text-left">Ad Hoc Volunteering</span> <span
                                                                class="radio-filters__text-right" id="adHocVolAmount">0</span>
                                                    </label>
                                                </div>
                                                <div class="radio-filters title-ctn__child searchTypeFilter "
                                                     data-group="type" data-role="reveal-content"
                                                     data-tag="allType volunteer">
                                                    <label class="radio-filters__lbl"> <input type="radio"
                                                                                              name="categories" data-role="radio-show-hide"
                                                                                              class="radio-filters__radio callSearch categoriesType"
                                                                                              data-target="regular"> <span
                                                                class="radio-filters__text-left">Regular Volunteering</span> <span
                                                                class="radio-filters__text-right" id="regVolAmount">0</span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="title-ctn is-expanded mt-12"
                                             data-role="radio-show-hide-target accr" data-tag="regular">
                                            <div class="title-ctn__head" data-role="accr__head">
                                                CURATED BY <i class="ico ico-chevron-up title-ctn__icon"></i>
                                            </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible">
                                                <ul class="checkbox-list causesFilter" data-role="list-show-more">

                                                    <li class="title-ctn__child"><label
                                                                class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                        value="NCSS" id="NCSS" class="callSearch accreditType"> <span
                                                                    class="checkbox-list__lbl-spn ">National Council of Social Service</span>
                                                        </label></li>

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="title-ctn is-expanded mt-12"
                                             data-role="radio-show-hide-target accr" data-tag="adHoc">
                                            <div class="title-ctn__head" data-role="accr__head">
                                                CURATED BY <i class="ico ico-chevron-up title-ctn__icon"></i>
                                            </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible">
                                                <ul class="checkbox-list causesFilter" data-role="list-show-more">
                                                    <li class="title-ctn__child"><label
                                                                class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                        value="VSG" id="VSG" class="callSearch volunteerSgOpportunity"> <span
                                                                    class="checkbox-list__lbl-spn ">Volunteer.gov.sg</span>
                                                        </label></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="title-ctn is-expanded mt-12 type_of_event_div"
                                             data-role=" accr reveal-content" data-group="type"
                                             data-tag="volunteer adHoc regular">
                                            <div class="title-ctn__head" data-role="accr__head">
                                                TYPE OF EVENT <i class="ico ico-chevron-up title-ctn__icon"></i>
                                            </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible">
                                                <ul class="list list--bot-space-large radio-btn radio-btn--large">
                                                    <li><label class="radio-btn__lbl"> <input class="radio-btn__radio callSearch typeOfEvent all"
                                                                                              name="typeOfEvent" type="radio" value="all" /> <span class="radio-btn__value ">All Events</span> </label></li> <li><label class="radio-btn__lbl"> <input class="radio-btn__radio callSearch typeOfEvent virtual"
                                                                                                                                                                                                                                                       name="typeOfEvent" type="radio" value="virtual" /> <span class="radio-btn__value ">Virtual</span> </label></li> <li><label class="radio-btn__lbl"> <input class="radio-btn__radio callSearch typeOfEvent physical"
                                                                                                                                                                                                                                                                                                                                                                                                                 name="typeOfEvent" type="radio" value="physical" /> <span class="radio-btn__value ">Physical</span> </label></li> </ul> </div> </div> <div class="title-ctn reveal-container mt-12 distance_town_tab" data-unselectable="true" role="js-reveal-container" data-role="accr reveal-content" data-group="type" data-tag="volunteer adHoc regular"> <div class="title-ctn__head" data-role="accr__head"> <div class="flag-obj"> <span class="flag-obj__item"> <a class="reveal-container__toggle text-link text-link--tab is-active location_tabs" data-toggle="reveal-collapse" href="#collapse-distance"> DISTANCE </a> </span> <span class="flag-obj__item"> <a class="reveal-container__toggle text-link text-link--tab location_tabs" data-toggle="reveal-collapse" href="#collapse-town"> TOWN </a> </span> </div> </div> <div class="title-ctn__body"> <div id="collapse-distance" class="reveal-container__collapse is-expanded"> <select class="select select--full select--h-40 " id="distanceList"> <option value="0">Select distance</option> <option value="1">Within 1km</option> <option value="2">Within 2km</option> </select> <div class="text-center mt-8 mb-8 body-txt body-txt--smaller font-mid-grey">from</div> <input class="input input--h-40  " id="postalCode" name=""
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        placeholder="Postal code" type="number"> <input
                                                            type="hidden"
                                                            id="geoLocLatitude" /> <input
                                                            type="hidden"
                                                            id="geoLocLongitude" /> </div> <div id="collapse-town" class="reveal-container__collapse"> <select class="js-town-search select2 select2--tall townsType" multiple="multiple" style="width: 100%"> <option value="1638339">Ang Mo Kio</option> <option value="1638341">Bedok</option> <option value="1638342">Bishan</option> <option value="4272203">Boon Lay</option> <option value="1638350">Bukit Batok</option> <option value="1638352">Bukit Merah</option> <option value="1638419">Bukit Panjang</option> <option value="1638353">Bukit Timah</option> <option value="4272204">Central Water Catchment</option> <option value="1638355">Changi</option> <option value="4272205">Changi Bay</option> <option value="1638357">Choa Chu Kang</option> <option value="1638359">Clementi</option> <option value="4272206">Downtown Core</option> <option value="1638365">Geylang</option> <option value="1638367">Hougang</option> <option value="1638336">Islandwide</option> <option value="1638371">Jurong East</option> <option value="1638372">Jurong West</option> <option value="1638374">Kallang</option> <option value="4272207">Lim Chu Kang</option> <option value="4272208">Mandai</option> <option value="4272209">Marina East</option> <option value="4272210">Marina South</option> <option value="1638387">Marine Parade</option> <option value="4272211">Museum</option> <option value="4272212">Newton</option> <option value="4272213">North-Eastern Islands</option> <option value="1638392">Novena</option> <option value="4272214">Orchard</option> <option value="4272215">Outram</option> <option value="1638422">Overseas</option> <option value="1638395">Pasir Ris</option> <option value="4272216">Paya Lebar</option> <option value="4272217">Pioneer</option> <option value="1638397">Punggol</option> <option value="1638398">Queenstown</option> <option value="4272218">River Valley</option> <option value="4272219">Rochor</option> <option value="4272220">Seletar</option> <option value="1638400">Sembawang</option> <option value="1638401">Sengkang</option> <option value="1638403">Serangoon</option> <option value="4272221">Simpang</option> <option value="4272222">Singapore River</option> <option value="1638421">Southern Islands</option> <option value="4272224">Straits View</option> <option value="4272225">Sungei Kadut</option> <option value="1638408">Tampines</option> <option value="4272226">Tanglin</option> <option value="4272227">Tengah</option> <option value="1638413">Toa Payoh</option> <option value="4272228">Tuas</option> <option value="4272229">Western Islands</option> <option value="4272230">Western Water Catchment</option> <option value="1638415">Woodlands</option> <option value="1638418">Yishun</option> </select> </div> </div>


                                        </div>

                                        <div class="title-ctn is-expanded mt-12 causes_div mb-40" data-role="accr">
                                            <div class="title-ctn__head" data-role="accr__head"> CAUSES <i class="ico ico-chevron-up title-ctn__icon"></i> </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible" data-role="accr__body"> <ul class="checkbox-list causesFilter" data-role="list-show-more">


                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                       value="animal"
                                                                                                       id="26746"
                                                                                                       class="callSearch causesType"> <span
                                                                    class="checkbox-list__lbl-spn ">Animal Welfare</span>
                                                        </label></li>


                                                    <li class="title-ctn__child"><label
                                                                class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                        value="arts"
                                                                                                        id="26747"
                                                                                                        class="callSearch causesType"> <span
                                                                    class="checkbox-list__lbl-spn ">Arts &amp; Heritage</span>
                                                        </label></li>


                                                    <li class="title-ctn__child"><label
                                                                class="checkbox-list__checkbox"> <input type="checkbox"
                                                                                                        value="children"
                                                                                                        id="26748"
                                                                                                        class="callSearch causesType"> <span
                                                                    class="checkbox-list__lbl-spn ">Children &amp; Youth</span>
                                                        </label></li>

                                                </ul>
                                            </div>
                                        </div>




                                        <div class="title-ctn is-expanded mt-12"
                                             data-role="accr reveal-content" data-group="type"
                                             data-tag="volunteer adHoc regular">
                                            <div class="title-ctn__head" data-role="accr__head">
                                                OPENINGS <i class="ico ico-chevron-up title-ctn__icon"></i>
                                            </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible">
                                                <ul class="checkbox-list">

                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input class="callSearch openingsType" max="10" min="1"
                                                                   type="checkbox"> <span class="checkbox-list__lbl-spn">1-10</span>
                                                        </label></li>

                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input class="callSearch openingsType" max="20" min="11"
                                                                   type="checkbox"> <span class="checkbox-list__lbl-spn">11-20</span>
                                                        </label></li>

                                                </ul>
                                            </div>
                                        </div>


                                        <div class="title-ctn  is-expanded mt-12"
                                             data-role="accr reveal-content" data-group="type"
                                             data-tag="volunteer adHoc regular">
                                            <div class="title-ctn__head" data-role="accr__head">
                                                SUITABILITY <i class="ico ico-chevron-up title-ctn__icon"></i>
                                            </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible">
                                                <!-- can put anything in here-->
                                                <!-- whatever in here is not part of this component-->
                                                <ul class="checkbox-list">

                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input class="callSearch suitabilityType" type="checkbox"
                                                                   value="1638419"> <span
                                                                    class="checkbox-list__lbl-spn ">First Timers</span>
                                                        </label></li>

                                                    <li class="title-ctn__child">
                                                        <label class="checkbox-list__checkbox">
                                                            <input class="callSearch suitabilityType" type="checkbox"
                                                                   value="1638420"> <span
                                                                    class="checkbox-list__lbl-spn ">Seniors</span>
                                                        </label></li>


                                                </ul>
                                            </div>
                                        </div>



                                        <div class="title-ctn is-expanded mt-12 mb-40 skills_div"
                                             data-role=" accr reveal-content" data-group="type"
                                             data-tag="volunteer adHoc regular">
                                            <div class="title-ctn__head" data-role="accr__head">
                                                SKILLS <i class="ico ico-chevron-up title-ctn__icon"></i>
                                            </div>
                                            <div class="title-ctn__body title-ctn__body--collapsible">
                                                <!-- can put anything in here-->
                                                <!-- whatever in here is not part of this component-->
                                                <ul class="checkbox-list">


                                                    <li class="title-ctn__child"><label
                                                                class="checkbox-list__checkbox"> <input
                                                                    class="callSearch skillsType" type="checkbox"
                                                                    value="33399"> <span
                                                                    class="checkbox-list__lbl-spn">Accounting & Finance</span>
                                                        </label></li>


                                                    <li class="title-ctn__child" ><label
                                                                class="checkbox-list__checkbox"> <input
                                                                    class="callSearch skillsType" type="checkbox"
                                                                    value="33400"> <span
                                                                    class="checkbox-list__lbl-spn">Arts & Music</span>
                                                        </label></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="search-result__main">
                                <div class="search-result__main-head" id="search-result-holder">
                                    <p class="font-black bold caps search-result__result">
                                        <strong class="big">3 </strong><span id="result_text">RESULTS FOUND</span>
                                    </p>
                                </div>

                                <div class="search-result__gallery-flex gallery--flex gallery--flex-fill-empty" id="searchlisting">



                                    <div class="card--flex card">
                                        <div class="card__head">
                                            <div class="gradient-over-image">
                                                <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url(images/case-8-1.jpg)"></div>
                                            </div>
                                            <div class="stats card__head-overlay font-white font-white">
                                                <span class="stats__num">198</span>
                                                <span class="stats__des">openings</span>
                                            </div>
                                        </div>
                                        <div class="card__body">
                                            <h2 class="card__title truncate break-word">Voices of Singapore Rehearsals &amp;...</h2>
                                            <div class="media-obj">
                                                <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word">by <span class="bold break-word">Venture Music Asia Ltd.</span></p>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-calendar"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Sun, 01 Jan 2023
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-time"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    12:00 AM to 12:00 AM
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-location"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Islandwide
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-people"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Suitable for: Open to All
                                                </div>
                                            </div>
                                            <div class="card__cta">
                                                <button class="button button--full mb-16 giving-cart-content" id="">DONATE TODAY</button>
                                            </div>
                                            <div class="card__cta">
                                                <button class="button button--no-bg button--full" onClick="window.open('#');">LEARN MORE</button>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="card__link" href="#"></a>
                                        </div>
                                    </div>




                                    <div class="card--flex card">
                                        <div class="card__head">
                                            <div class="gradient-over-image">
                                                <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url(images/case-30.jpg)"></div>
                                            </div>
                                            <div class="stats card__head-overlay font-white font-white">
                                                <span class="stats__num">6</span>
                                                <span class="stats__des">openings</span>
                                            </div>
                                        </div>
                                        <div class="card__body">
                                            <h2 class="card__title truncate break-word">
                                                Graphic Designers
                                            </h2>
                                            <div class="media-obj">
                                                <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word">by <span class="bold break-word">SG Cares Volunteer Centre at Ang Mo Kio</span></p>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-calendar"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Fri, 10 Feb 2023
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-time"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    12:00 AM to 12:00 AM
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-location"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Virtual
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-people"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Suitable for: Open to All
                                                </div>
                                            </div>
                                            <div class="card__cta">
                                                <button class="button button--no-bg button--full" onClick="window.open('#');">LEARN MORE</button>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="card__link" href="#"></a>
                                        </div>
                                    </div>





                                    <div class="card--flex card">
                                        <div class="card__head">
                                            <div class="gradient-over-image">
                                                <div class="gradient-over-image__image  gradient-over-image__image--bg" style="background-image:url(images/logo1.png)"></div>
                                            </div>
                                            <div class="stats card__head-overlay font-white font-white">
                                                <span class="stats__num">1</span>
                                                <span class="stats__des">opening</span>
                                            </div>
                                        </div>
                                        <div class="card__body">
                                            <h2 class="card__title truncate break-word">Piano Tuning for Ang Mo Kio Thye Hua Kwan...</h2>
                                            <div class="media-obj">
                                                <p class="body-txt body-txt--smaller body-txt--no-letter-space font-mid-grey break-word">by <span class="bold break-word">SG Cares Volunteer Centre at Ang Mo Kio</span></p>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-calendar"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Mon, 20 Feb 2023
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-time"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    12:00 AM to 12:00 AM
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-location"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Ang Mo Kio
                                                </div>
                                            </div>
                                            <div class="media-obj mt-16">
                                                <div class="media-obj__asset">
                                                    <i class="ico ico--small ico-people"></i>
                                                </div>
                                                <div class="media-obj__main media-obj__main--small-spacing body-txt body-txt--small">
                                                    Suitable for: Open to All
                                                </div>
                                            </div>
                                            <div class="card__cta">
                                                <button class="button button--no-bg button--full" onClick="window.open('#');">LEARN MORE</button>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="card__link" href="#"></a>
                                        </div>
                                    </div>








                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>

@endsection
