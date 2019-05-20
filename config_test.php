<?php
    //includes
    define ("INCLUDES_PATH", realpath('../../includes/'));
    define ("INCLUDES_BLOGS_PATH", realpath('../../includes/blogs'));
    define ("INCLUDES_CHART_PATH", realpath('../../includes/chart'));
    define ("INCLUDES_CONTACTUS_PATH", realpath('../../includes/contactUs'));
    define ("INCLUDES_EVENTS_PATH", realpath('../../includes/events'));
    define ("INCLUDES_FAQ_PATH", realpath('../../includes/faq'));
    define ("INCLUDES_GAINERSLOSERS_PATH", realpath('../../includes/gainersLosers'));
    define ("INCLUDES_LOGINREGISTRATION_PATH", realpath('../../includes/loginRegistration'));
    define ("INCLUDES_NEWS_PATH", realpath('../../includes/news'));
    define ("INCLUDES_PORTFOLIO_PATH", realpath('../../includes/portfolio'));
    define ("INCLUDES_SEARCH_PATH", realpath('../../includes/search'));
    define ("INCLUDES_STATUS_PATH", realpath('../../includes/status'));
    define ("INCLUDES_WATCHLIST_PATH", realpath('../../includes/watchlist'));
    define ("INCLUDES_IPO_PATH", realpath('../../includes/IPO'));
    
    //models
    define ("MODELS_PATH", realpath('../../models/'));
    define ("MODELS_BLOGS_PATH", realpath('../../models/blogs'));
    define ("MODELS_CHART_PATH", realpath('../../models/chart'));
    define ("MODELS_COMMENTS_PATH", realpath('../../models/comments'));
    define ("MODELS_FAQ_PATH", realpath('../../models/faq'));
    define ("MODELS_GAINERSLOSERS_PATH", realpath('../../models/gainersLosers'));
    define ("MODELS_STATUS_PATH", realpath('../../models/status'));
    define ("MODELS_STATUSCOMMENTS_PATH", realpath('../../models/statusComments'));
    define ("MODELS_NEWS_PATH", realpath('../../models/news'));
    define ("MODELS_PORTFOLIO_PATH", realpath('../../models/portfolio'));
    define ("MODELS_WATCHLIST_PATH", realpath('../../models/watchlist'));
    
    //css
    define ("CSS_PATH", realpath('../../css/'));
    define ("CSS_BOOTSTRAP_PATH", realpath('../../css/bootstrap-4.3.1'));

	//images
	define ("IMAGES_PATH", realpath('../../images/'));

	//js files
	define ("JS_PATH", realpath('../../js/'));
    
    $paths = array(INCLUDES_PATH, INCLUDES_BLOGS_PATH, INCLUDES_CHART_PATH, INCLUDES_CONTACTUS_PATH, INCLUDES_EVENTS_PATH, INCLUDES_FAQ_PATH, INCLUDES_GAINERSLOSERS_PATH, INCLUDES_LOGINREGISTRATION_PATH, INCLUDES_NEWS_PATH, INCLUDES_PORTFOLIO_PATH, INCLUDES_SEARCH_PATH, INCLUDES_STATUS_PATH, INCLUDES_WATCHLIST_PATH, MODELS_PATH, MODELS_BLOGS_PATH, MODELS_CHART_PATH, MODELS_COMMENTS_PATH, MODELS_FAQ_PATH, MODELS_GAINERSLOSERS_PATH, MODELS_NEWS_PATH, MODELS_PORTFOLIO_PATH, MODELS_WATCHLIST_PATH, CSS_PATH, CSS_BOOTSTRAP_PATH);
    set_include_path(implode($paths, PATH_SEPARATOR));
