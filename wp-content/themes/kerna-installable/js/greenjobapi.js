var Grnhse = Grnhse || {};

Grnhse.Settings = {
  targetDomain:   'https://boards.greenhouse.io',
  scrollOnLoad:   true,
  autoLoad:       true,
  boardURI:       'https://boards.greenhouse.io/embed/job_board?for=c1consulting',
  applicationURI: 'https://boards.greenhouse.io/embed/job_app?for=c1consulting',
  baseURI:        '',
  iFrameWidth:    '100%',
  iFrameHeight:   '100%'
};

var Grnhse = Grnhse || {};

Grnhse.Const = {
  JOB_ID:         'gh_jid',
  SOURCE_TOKEN:   'gh_src'
};

Grnhse.Config = {
  IframeDefault: {
    id:           'grnhse_iframe',
    width:        Grnhse.Settings.iFrameWidth,
height:	Grnhse.Settings.iFrameHeight,
    frameborder:  '0',
    scrolling:    'yes',
    onload:       undefined
  }
};

Grnhse.Route = {
  boardUrl: function(source) {
    var helper = Grnhse.UriHelper,
        settings = Grnhse.Settings,
        params = [];

    if(source) {
      params.push('t=' + source);
    }

    return helper.appendParams(settings.boardURI, params);
  },
  applicationUrl: function(source, jobId) {
    var helper = Grnhse.UriHelper,
        settings = Grnhse.Settings,
        params = [];

    if(source) {
      params.push('t=' + source);
    }

    if(jobId) {
      params.push('token=' + jobId);
    }

    return helper.appendParams(settings.applicationURI, params);
  }
};

Grnhse.UriHelper = {
  base: function() {
    var uriHelper = Grnhse.UriHelper, 
        location = uriHelper.currentLocation(),
        settings = Grnhse.Settings;
        
    return window && location ? uriHelper.pathFromLocation(location) : settings.boardURI;
  },
  // Gives us something stubbable for units
  currentLocation: function() {
    return window.top.location;
  },
  getParam: function(name) {
    var location = Grnhse.UriHelper.currentLocation(),
        uri = location.href, 
        start = uri.indexOf(name), 
        end;

    if(start === -1) {
      return null;
    }

    start += name.length + 1;
    end   = uri.substr(start).search(/(&|#|$)/);

    return uri.substr(start, end);
  },
  appendParams: function(url, params) {
    params.push('b=' + Grnhse.UriHelper.base());
    url += (url.indexOf('?') === -1) ? '?' : '&';
    return url + params.join('&');
  },
  pathFromLocation: function(location) {
    return location.protocol + '//' + location.host + location.pathname;
  }
};

Grnhse.BrowserHelper = {
  supportsPostMessage: function() {
    // Feature detect for <IE9
    return !(document.all && !window.atob);
  }
};

Grnhse.Iframe = function(src, overrides) {
  var settings = Grnhse.Settings,
      self = this;

  overrides = overrides || {};

  this.config = Grnhse.Config.IframeDefault;
  this.config.src = src;

  this.supportAwfulBrowsers();

  overrides['onload'] = settings.scrollOnLoad ? 'window.scrollTo(0,0)' : undefined;

  mergeOverrides.call(this);

  this.htmlElement = this.build();
  this.render();

  function mergeOverrides() {
    for(var override in overrides) {
      if(overrides.hasOwnProperty(override)) {
        self.config[override] = overrides[override];
      }
    }
  }
};

Grnhse.Iframe.prototype.build = function() {
  var iframe = document.createElement('iframe'),
      config = this.config;

  for(var key in config) {
    if(config.hasOwnProperty(key)) {
      iframe.setAttribute(key, config[key]);
    }
  }

  return iframe;
};

Grnhse.Iframe.prototype.render = function() {
  var container = document.getElementById('grnhse_app');
  
  container.innerHTML = '';
  container.appendChild(this.htmlElement);

  this.registerEventHandlers();
};

Grnhse.Iframe.prototype.registerEventHandlers = function() {
    var instance = this;

    if (window.addEventListener) {
      window.addEventListener('message', resize, false);
    } else if (window.attachEvent) {
      window.attachEvent('onmessage', resize);
    }

    function resize(e) {
      if(e.origin === Grnhse.Settings.targetDomain && e.data > 0) {
        instance.htmlElement.setAttribute('height', e.data);
      }
    }
};

// Since IE8 and other old browsers don't support postMessage, 
// just let the iFrame scroll if postMessage is unsupported
Grnhse.Iframe.prototype.supportAwfulBrowsers = function() {
  var browserHelper = Grnhse.BrowserHelper;

  if(!browserHelper.supportsPostMessage()) {
    this.config['scrolling'] = 'yes';
    this.config['height'] = 1000;
  }
};

Grnhse.Iframe.load = function(jobId, source) {
  var r = Grnhse.Route,
      uriHelper = Grnhse.UriHelper,
      jobId = jobId || uriHelper.getParam(Grnhse.Const.JOB_ID),
      source = source || uriHelper.getParam(Grnhse.Const.SOURCE_TOKEN),
      viewingApplication = !!jobId,
      pathToLoad = viewingApplication ? r.applicationUrl(source, jobId) : r.boardUrl(source);
  
  return new Grnhse.Iframe(pathToLoad);
};

//This alias is being introduce for backwards compatibility 
//with the old job board code
var _grnhse = _grnhse || {};
_grnhse.load = Grnhse.Iframe.load;

(function() {
  if(Grnhse.Settings.autoLoad) {
    var f = window.onload;
    window.onload = function() { 
      try {
        if( typeof f === 'function' ) { f(); }
      } catch(e) {
        console.error(e);
      } finally {
        Grnhse.Iframe.load();
      }
    };
  }
})();
