
            try {
                "use strict";

Array.prototype.remove = function () {
    var output = [];

    for (var _len = arguments.length, args = Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
    }

    for (var i = 0; i < args.length; i++) {
        var arg = args[i];
        var index = this.indexOf(arg);
        if (index !== -1) {
            output.push(this.splice(index, 1));
        }
    }
    if (args.length === 1) {
        output = output[0];
    }
    return output;
};

Array.prototype.contains = function (v) {
    return this.indexOf(v) > -1;
};

Array.prototype.toggleItem = function (v) {
    if (this.contains(v)) {
        this.remove(v);
    } else {
        this.push(v);
    }
};

String.prototype.lpad = function (padString, length) {
    var str = this;
    while (str.length < length) {
        str = padString + str;
    }
    return str;
};


(function (global) {
  var babelHelpers = global.babelHelpers = {};
  babelHelpers.typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
    return typeof obj;
  } : function (obj) {
    return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
  };

  babelHelpers.jsx = function () {
    var REACT_ELEMENT_TYPE = typeof Symbol === "function" && Symbol.for && Symbol.for("react.element") || 0xeac7;
    return function createRawReactElement(type, props, key, children) {
      var defaultProps = type && type.defaultProps;
      var childrenLength = arguments.length - 3;

      if (!props && childrenLength !== 0) {
        props = {};
      }

      if (props && defaultProps) {
        for (var propName in defaultProps) {
          if (props[propName] === void 0) {
            props[propName] = defaultProps[propName];
          }
        }
      } else if (!props) {
        props = defaultProps || {};
      }

      if (childrenLength === 1) {
        props.children = children;
      } else if (childrenLength > 1) {
        var childArray = Array(childrenLength);

        for (var i = 0; i < childrenLength; i++) {
          childArray[i] = arguments[i + 3];
        }

        props.children = childArray;
      }

      return {
        $$typeof: REACT_ELEMENT_TYPE,
        type: type,
        key: key === undefined ? null : '' + key,
        ref: null,
        props: props,
        _owner: null
      };
    };
  }();

  babelHelpers.asyncIterator = function (iterable) {
    if (typeof Symbol === "function") {
      if (Symbol.asyncIterator) {
        var method = iterable[Symbol.asyncIterator];
        if (method != null) return method.call(iterable);
      }

      if (Symbol.iterator) {
        return iterable[Symbol.iterator]();
      }
    }

    throw new TypeError("Object is not async iterable");
  };

  babelHelpers.asyncGenerator = function () {
    function AwaitValue(value) {
      this.value = value;
    }

    function AsyncGenerator(gen) {
      var front, back;

      function send(key, arg) {
        return new Promise(function (resolve, reject) {
          var request = {
            key: key,
            arg: arg,
            resolve: resolve,
            reject: reject,
            next: null
          };

          if (back) {
            back = back.next = request;
          } else {
            front = back = request;
            resume(key, arg);
          }
        });
      }

      function resume(key, arg) {
        try {
          var result = gen[key](arg);
          var value = result.value;

          if (value instanceof AwaitValue) {
            Promise.resolve(value.value).then(function (arg) {
              resume("next", arg);
            }, function (arg) {
              resume("throw", arg);
            });
          } else {
            settle(result.done ? "return" : "normal", result.value);
          }
        } catch (err) {
          settle("throw", err);
        }
      }

      function settle(type, value) {
        switch (type) {
          case "return":
            front.resolve({
              value: value,
              done: true
            });
            break;

          case "throw":
            front.reject(value);
            break;

          default:
            front.resolve({
              value: value,
              done: false
            });
            break;
        }

        front = front.next;

        if (front) {
          resume(front.key, front.arg);
        } else {
          back = null;
        }
      }

      this._invoke = send;

      if (typeof gen.return !== "function") {
        this.return = undefined;
      }
    }

    if (typeof Symbol === "function" && Symbol.asyncIterator) {
      AsyncGenerator.prototype[Symbol.asyncIterator] = function () {
        return this;
      };
    }

    AsyncGenerator.prototype.next = function (arg) {
      return this._invoke("next", arg);
    };

    AsyncGenerator.prototype.throw = function (arg) {
      return this._invoke("throw", arg);
    };

    AsyncGenerator.prototype.return = function (arg) {
      return this._invoke("return", arg);
    };

    return {
      wrap: function (fn) {
        return function () {
          return new AsyncGenerator(fn.apply(this, arguments));
        };
      },
      await: function (value) {
        return new AwaitValue(value);
      }
    };
  }();

  babelHelpers.asyncGeneratorDelegate = function (inner, awaitWrap) {
    var iter = {},
        waiting = false;

    function pump(key, value) {
      waiting = true;
      value = new Promise(function (resolve) {
        resolve(inner[key](value));
      });
      return {
        done: false,
        value: awaitWrap(value)
      };
    }

    ;

    if (typeof Symbol === "function" && Symbol.iterator) {
      iter[Symbol.iterator] = function () {
        return this;
      };
    }

    iter.next = function (value) {
      if (waiting) {
        waiting = false;
        return value;
      }

      return pump("next", value);
    };

    if (typeof inner.throw === "function") {
      iter.throw = function (value) {
        if (waiting) {
          waiting = false;
          throw value;
        }

        return pump("throw", value);
      };
    }

    if (typeof inner.return === "function") {
      iter.return = function (value) {
        return pump("return", value);
      };
    }

    return iter;
  };

  babelHelpers.asyncToGenerator = function (fn) {
    return function () {
      var gen = fn.apply(this, arguments);
      return new Promise(function (resolve, reject) {
        function step(key, arg) {
          try {
            var info = gen[key](arg);
            var value = info.value;
          } catch (error) {
            reject(error);
            return;
          }

          if (info.done) {
            resolve(value);
          } else {
            return Promise.resolve(value).then(function (value) {
              step("next", value);
            }, function (err) {
              step("throw", err);
            });
          }
        }

        return step("next");
      });
    };
  };

  babelHelpers.classCallCheck = function (instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError("Cannot call a class as a function");
    }
  };

  babelHelpers.createClass = function () {
    function defineProperties(target, props) {
      for (var i = 0; i < props.length; i++) {
        var descriptor = props[i];
        descriptor.enumerable = descriptor.enumerable || false;
        descriptor.configurable = true;
        if ("value" in descriptor) descriptor.writable = true;
        Object.defineProperty(target, descriptor.key, descriptor);
      }
    }

    return function (Constructor, protoProps, staticProps) {
      if (protoProps) defineProperties(Constructor.prototype, protoProps);
      if (staticProps) defineProperties(Constructor, staticProps);
      return Constructor;
    };
  }();

  babelHelpers.defineEnumerableProperties = function (obj, descs) {
    for (var key in descs) {
      var desc = descs[key];
      desc.configurable = desc.enumerable = true;
      if ("value" in desc) desc.writable = true;
      Object.defineProperty(obj, key, desc);
    }

    return obj;
  };

  babelHelpers.defaults = function (obj, defaults) {
    var keys = Object.getOwnPropertyNames(defaults);

    for (var i = 0; i < keys.length; i++) {
      var key = keys[i];
      var value = Object.getOwnPropertyDescriptor(defaults, key);

      if (value && value.configurable && obj[key] === undefined) {
        Object.defineProperty(obj, key, value);
      }
    }

    return obj;
  };

  babelHelpers.defineProperty = function (obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  };

  babelHelpers.extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  babelHelpers.get = function get(object, property, receiver) {
    if (object === null) object = Function.prototype;
    var desc = Object.getOwnPropertyDescriptor(object, property);

    if (desc === undefined) {
      var parent = Object.getPrototypeOf(object);

      if (parent === null) {
        return undefined;
      } else {
        return get(parent, property, receiver);
      }
    } else if ("value" in desc) {
      return desc.value;
    } else {
      var getter = desc.get;

      if (getter === undefined) {
        return undefined;
      }

      return getter.call(receiver);
    }
  };

  babelHelpers.inherits = function (subClass, superClass) {
    if (typeof superClass !== "function" && superClass !== null) {
      throw new TypeError("Super expression must either be null or a function, not " + typeof superClass);
    }

    subClass.prototype = Object.create(superClass && superClass.prototype, {
      constructor: {
        value: subClass,
        enumerable: false,
        writable: true,
        configurable: true
      }
    });
    if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass;
  };

  babelHelpers.instanceof = function (left, right) {
    if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) {
      return right[Symbol.hasInstance](left);
    } else {
      return left instanceof right;
    }
  };

  babelHelpers.interopRequireDefault = function (obj) {
    return obj && obj.__esModule ? obj : {
      default: obj
    };
  };

  babelHelpers.interopRequireWildcard = function (obj) {
    if (obj && obj.__esModule) {
      return obj;
    } else {
      var newObj = {};

      if (obj != null) {
        for (var key in obj) {
          if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key];
        }
      }

      newObj.default = obj;
      return newObj;
    }
  };

  babelHelpers.newArrowCheck = function (innerThis, boundThis) {
    if (innerThis !== boundThis) {
      throw new TypeError("Cannot instantiate an arrow function");
    }
  };

  babelHelpers.objectDestructuringEmpty = function (obj) {
    if (obj == null) throw new TypeError("Cannot destructure undefined");
  };

  babelHelpers.objectWithoutProperties = function (obj, keys) {
    var target = {};

    for (var i in obj) {
      if (keys.indexOf(i) >= 0) continue;
      if (!Object.prototype.hasOwnProperty.call(obj, i)) continue;
      target[i] = obj[i];
    }

    return target;
  };

  babelHelpers.possibleConstructorReturn = function (self, call) {
    if (!self) {
      throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
    }

    return call && (typeof call === "object" || typeof call === "function") ? call : self;
  };

  babelHelpers.selfGlobal = typeof global === "undefined" ? self : global;

  babelHelpers.set = function set(object, property, value, receiver) {
    var desc = Object.getOwnPropertyDescriptor(object, property);

    if (desc === undefined) {
      var parent = Object.getPrototypeOf(object);

      if (parent !== null) {
        set(parent, property, value, receiver);
      }
    } else if ("value" in desc && desc.writable) {
      desc.value = value;
    } else {
      var setter = desc.set;

      if (setter !== undefined) {
        setter.call(receiver, value);
      }
    }

    return value;
  };

  babelHelpers.slicedToArray = function () {
    function sliceIterator(arr, i) {
      var _arr = [];
      var _n = true;
      var _d = false;
      var _e = undefined;

      try {
        for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
          _arr.push(_s.value);

          if (i && _arr.length === i) break;
        }
      } catch (err) {
        _d = true;
        _e = err;
      } finally {
        try {
          if (!_n && _i["return"]) _i["return"]();
        } finally {
          if (_d) throw _e;
        }
      }

      return _arr;
    }

    return function (arr, i) {
      if (Array.isArray(arr)) {
        return arr;
      } else if (Symbol.iterator in Object(arr)) {
        return sliceIterator(arr, i);
      } else {
        throw new TypeError("Invalid attempt to destructure non-iterable instance");
      }
    };
  }();

  babelHelpers.slicedToArrayLoose = function (arr, i) {
    if (Array.isArray(arr)) {
      return arr;
    } else if (Symbol.iterator in Object(arr)) {
      var _arr = [];

      for (var _iterator = arr[Symbol.iterator](), _step; !(_step = _iterator.next()).done;) {
        _arr.push(_step.value);

        if (i && _arr.length === i) break;
      }

      return _arr;
    } else {
      throw new TypeError("Invalid attempt to destructure non-iterable instance");
    }
  };

  babelHelpers.taggedTemplateLiteral = function (strings, raw) {
    return Object.freeze(Object.defineProperties(strings, {
      raw: {
        value: Object.freeze(raw)
      }
    }));
  };

  babelHelpers.taggedTemplateLiteralLoose = function (strings, raw) {
    strings.raw = raw;
    return strings;
  };

  babelHelpers.temporalRef = function (val, name, undef) {
    if (val === undef) {
      throw new ReferenceError(name + " is not defined - temporal dead zone");
    } else {
      return val;
    }
  };

  babelHelpers.temporalUndefined = {};

  babelHelpers.toArray = function (arr) {
    return Array.isArray(arr) ? arr : Array.from(arr);
  };

  babelHelpers.toConsumableArray = function (arr) {
    if (Array.isArray(arr)) {
      for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) arr2[i] = arr[i];

      return arr2;
    } else {
      return Array.from(arr);
    }
  };
})(typeof global === "undefined" ? self : global);


(function (global) {
  var babelHelpers = global.babelHelpers

  var createClass = babelHelpers.createClass
  babelHelpers.createClass = (Constructor, protoProps, staticProps) => {
    var cls = createClass(Constructor, protoProps, staticProps)
    cls.__babelClass = true

    cls.inject = () => {
      var fx = function () {
        var args = Array.prototype.slice.apply(arguments)
        var instance = new (cls.bind.apply(cls, [null].concat(args)))()
        angular.extend(instance, this)
        return instance
      }
      fx.$inject = cls.$inject
      return fx
    }

    return cls
  }

  babelHelpers.classCallCheck = function () {}

  const functionToString = Function.prototype.toString

  Function.prototype.toString = function () { // eslint-disable-line
    if (this && this.__signatureOverride) {
      return this.__signatureOverride
    }
    if (this && this.__babelClass) {
      var s = functionToString.apply(this)
      return s.replace(/^function/, 'class')
    }
    return functionToString.apply(this)
  }
})(typeof global === 'undefined' ? self : global)

'use strict';

var __ngBootstrap = function __ngBootstrap(exclude) {
    exclude = exclude || [];
    var modules = [];
    for (var pluginName in window.__ngModules) {
        if (exclude.contains(pluginName)) continue;
        modules = modules.concat(window.__ngModules[pluginName]);
    }

    var id = 'app__' + Date.now();
    angular.module(id, modules);
    angular.bootstrap(document, [id]);
};

var __ngShowBootstrapError = function __ngShowBootstrapError() {
    $('.global-bootstrap-error').show();
    console.error('Angular bootstrap has failed');
    console.warn('Consider sending the following error to https://github.com/ajenti/ajenti/issues/new');
};

var __ngShowBootstrapRecovered = function __ngShowBootstrapRecovered(plugin) {
    $('.global-bootstrap-recovered').removeClass('hidden');
    $('.global-bootstrap-recovered .plugin-name').text(plugin);
    $('.global-bootstrap-recovered .btn-close').click(function () {
        $('.global-bootstrap-recovered').remove();
    });
};

window.ajentiBootstrap = function () {
    try {
        __ngBootstrap();
    } catch (e) {
        console.warn('Well, this is awkward');
        console.group('Angular bootstrap has failed:');
        console.error(e);

        for (var pluginName in window.__ngModules) {
            try {
                __ngBootstrap([pluginName]);
                console.log('Worked with ' + pluginName + ' disabled!');
                console.groupEnd();
                __ngShowBootstrapRecovered(pluginName);
                return;
            } catch (e) {
                console.warn('Still failing with ' + pluginName + ' disabled:', e);
            }
        }

        console.groupEnd();
        window.__ngShowBootstrapError();
        throw e;
    }
};


'use strict';

angular.module('core', ['ngAnimate', 'ngRoute', 'ngStorage', 'ngTouch', 'angular-loading-bar', 'btford.socket-io', 'toaster', 'ui.bootstrap', 'angular-sortable-view', 'base64', 'gettext']);

angular.module('core').config(function ($httpProvider, $animateProvider, $compileProvider) {
    $httpProvider.interceptors.push('urlPrefixInterceptor');
    $httpProvider.interceptors.push('unauthenticatedInterceptor');
    $animateProvider.classNameFilter(/animate.+/);
    $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|data|file):/);
});

angular.module('core').run(function () {
    return FastClick.attach(document.body);
});

angular.module('core').factory('$exceptionHandler', function ($injector, $log, gettext) {
    return function (exception, cause) {
        var str = exception.toString();
        if (str && str.indexOf('Possibly unhandled rejection') != 0) {
            $injector.get('notify').warning(gettext('Unhandled error occurred'), gettext('Please see browser console'));
        } else {
            $log.debug.apply($log, arguments);
            return;
        }

        console.group('Unhandled exception occured');
        console.warn('Consider sending this error to https://github.com/ajenti/ajenti/issues/new');
        $log.error.apply($log, arguments);
        console.groupEnd();
    };
});


'use strict';

angular.module('core').filter('bytes', function (gettext) {
    return function (bytes, precision) {
        if (isNaN(parseFloat(bytes)) || !isFinite(bytes)) {
            return '-';
        }
        if (bytes === 0) {
            return gettext('0 bytes');
        }
        if (typeof precision === 'undefined') {
            precision = 1;
        }
        var units = [gettext('bytes'), gettext('KB'), gettext('MB'), gettext('GB'), gettext('TB'), gettext('PB')];
        var number = Math.floor(Math.log(bytes) / Math.log(1024));

        var x = bytes / Math.pow(1024, Math.floor(number));
        if (number === 0) {
            x = Math.floor(x);
        } else {
            x = x.toFixed(precision);
        }

        return x + ' ' + units[number];
    };
});

angular.module('core').filter('ordinal', function (gettext) {
    return function (input) {
        if (isNaN(input) || input === null) {
            return input;
        }

        var s = [gettext('th'), gettext('st'), gettext('nd'), gettext('rd')];
        var v = input % 100;
        return input + (s[(v - 20) % 10] || s[v] || s[0]);
    };
});

angular.module('core').filter('page', function () {
    return function (list, page, pageSize) {
        if (list && pageSize) {
            return list.slice((page - 1) * pageSize, page * pageSize);
        }
    };
});

angular.module('core').filter('rankMatch', function () {
    return function (input, field, query) {
        if (!input) {
            return input;
        }
        var rgx = new RegExp(query, 'gi');
        for (var i = 0; i < input.length; i++) {
            var item = input[i];
            var points = 0;
            var data = item[field];
            points += (data.match(rgx) || []).length;
            if (data === query) {
                points += 50;
            }
            if (data.indexOf(query) === 0) {
                points += 10;
            }
            item.rank = points;
        }
        return input;
    };
});

angular.module('core').filter('time', function () {
    return function (time, frac) {
        if (time === null || !angular.isDefined(time)) {
            return '--:--:--';
        }
        var s = '';
        if (time >= 3600 * 24) {
            s += Math.floor(time / 3600 / 24) + 'd ';
        }
        s += ('' + Math.floor(time / 60 / 60) % 24).lpad('0', 2) + ':';
        s += ('' + Math.floor(time / 60) % 60).lpad('0', 2) + ':';
        s += ('' + Math.floor(time) % 60).lpad('0', 2);
        if (frac) {
            s += '.' + ('' + Math.floor((time - Math.floor(time)) * Math.pow(10, frac))).lpad('0', frac + 0);
        }
        return s;
    };
});


'use strict';

angular.module('core').factory('unauthenticatedInterceptor', function ($q, $rootScope, $location, $window, notify, urlPrefix, messagebox, gettext) {
    return {
        responseError: function responseError(rejection) {
            if (rejection.status === 500 && rejection.data.exception === 'SecurityError') {
                notify.error(gettext('Security error'), rejection.data.message);
            } else if (rejection.status === 500 && rejection.data.exception !== 'EndpointError') {
                messagebox.show({
                    title: gettext('Server error'),
                    data: rejection,
                    template: '/core:resources/partial/serverErrorMessage.html',
                    scrollable: true,
                    negative: gettext('Close')
                });
            } else if (rejection.status === 401) {
                if ($rootScope.disableExpiredSessionInterceptor || $location.path().indexOf(urlPrefix + '/view/login') === 0) {
                    return $q.reject(rejection);
                }

                $rootScope.disableExpiredSessionInterceptor = true;
                notify.error(gettext('Your session has expired'));
                $window.location.assign(urlPrefix + '/view/login/normal/' + $location.path());
            }

            return $q.reject(rejection);
        }
    };
});

angular.module('core').factory('urlPrefixInterceptor', function ($q, $rootScope, $location, notify, urlPrefix) {
    return {
        request: function request(config) {
            if (config.url && config.url[0] === '/') {
                config.url = urlPrefix + config.url;
            }
            return config;
        }
    };
});


'use strict';

angular.module('core').config(function ($routeProvider, $locationProvider, urlPrefix) {
    $locationProvider.html5Mode({ enabled: true, requireBase: false });

    $routeProvider.originalWhen = $routeProvider.when;
    $routeProvider.when = function (url, config) {
        url = urlPrefix + url;
        return $routeProvider.originalWhen(url, config);
    };

    $routeProvider.when('/view/', {
        templateUrl: '/core:resources/partial/index.html',
        controller: 'CoreIndexController'
    });

    $routeProvider.when('/view/login/:mode', {
        templateUrl: '/core:resources/partial/login.html',
        controller: 'CoreLoginController'
    });

    $routeProvider.when('/view/login/:mode/:nextPage*', {
        templateUrl: '/core:resources/partial/login.html',
        controller: 'CoreLoginController'
    });

    $routeProvider.when('/view/ui-test', {
        templateUrl: '/core:resources/partial/index.html'
    });

    $routeProvider.otherwise({
        controller: 'CoreError404',
        templateUrl: '/core:resources/partial/404.html'
    });
});

angular.module('core').run(function ($location, urlPrefix) {
    $location._oldPath = $location.path;
    return $location.path = function (path) {
        if (path) {
            path = urlPrefix + path;
        }
        return $location._oldPath(path);
    };
});


'use strict';

angular.module('core').controller('CoreIndexController', function ($scope, $location, customization, identity, urlPrefix) {
    $location.path(customization.plugins.core.startupURL || '/view/dashboard');

    identity.promise.then(function () {
        if (!identity.user) {
            location.assign(urlPrefix + '/view/login/normal');
        }
    });
});


'use strict';

angular.module('core').controller('CoreLoginController', function ($scope, $log, $rootScope, $routeParams, identity, notify, gettext, customization) {
    $rootScope.disableExpiredSessionInterceptor = true;
    $scope.working = false;
    $scope.success = false;

    if ($routeParams.mode.indexOf('sudo:') === 0) {
        $scope.mode = 'sudo';
        $scope.username = $routeParams.mode.split(':')[1];
    } else {
        $scope.mode = $routeParams.mode;
    }

    $scope.login = function () {
        if (!$scope.username || !$scope.password) {
            return;
        }
        $scope.working = true;
        $scope.username = $scope.username.toLowerCase();
        identity.auth($scope.username, $scope.password, $scope.mode).then(function (username) {
            $scope.success = true;
            location.href = customization.plugins.core.loginredir || $routeParams.nextPage || '/';
        }, function (error) {
            $scope.working = false;
            $log.log('Authentication failed', error);
            notify.error(gettext('Authentication failed'));
        });
    };
});


'use strict';

angular.module('core').controller('CoreRootController', function ($scope, $rootScope, $location, $localStorage, $log, $timeout, $q, $interval, $http, $window, identity, customization, urlPrefix, ajentiPlugins, ajentiVersion, ajentiPlatform, ajentiPlatformUnmapped, favicon, feedback, locale, config) {
    $rootScope.identity = identity;
    $rootScope.$location = $location;
    $rootScope.location = location;
    $rootScope.urlPrefix = urlPrefix;
    $rootScope.feedback = feedback;
    $rootScope.ajentiVersion = ajentiVersion;
    $rootScope.ajentiPlugins = ajentiPlugins;
    $rootScope.customization = customization;

    // todo figure this out, used in settings template
    $rootScope.keys = function (x) {
        if (x) {
            return Object.keys(x);
        } else {
            return [];
        }
    };

    console.group('Welcome');
    console.info('Ajenti', ajentiVersion);
    console.log('Running on', ajentiPlatform, '/', ajentiPlatformUnmapped);
    if (urlPrefix) {
        console.log('URL prefix', urlPrefix);
    }
    console.log('Plugins', ajentiPlugins);
    console.groupEnd();

    $scope.navigationPresent = $location.path().indexOf('/view/login') === -1;

    feedback.init();

    // ---

    $scope.showSidebar = angular.isDefined($localStorage.showSidebar) ? $localStorage.showSidebar : true;
    $rootScope.toggleNavigation = function (state) {
        if (angular.isDefined(state)) {
            $scope.showSidebar = state;
        } else {
            $scope.showSidebar = !$scope.showSidebar;
        }
        $localStorage.showSidebar = $scope.showSidebar;
        $scope.$broadcast('navigation:toggle');
    };

    // ---
    $scope.showOverlaySidebar = false;
    $rootScope.toggleOverlayNavigation = function (state) {
        if (angular.isDefined(state)) {
            $scope.showOverlaySidebar = state;
        } else {
            $scope.showOverlaySidebar = !$scope.showOverlaySidebar;
        }
        $scope.$broadcast('navigation:toggle');
    };

    $scope.$on('$routeChangeStart', function () {
        $scope.updateResttime();
    });

    $scope.$on('$routeChangeSuccess', function () {
        $scope.toggleOverlayNavigation(false);
        feedback.emit('navigation', { url: $location.path() });
    });

    // ---

    $scope.isWidescreen = angular.isDefined($localStorage.isWidescreen) ? $localStorage.isWidescreen : false;

    $scope.toggleWidescreen = function (state) {
        if (angular.isDefined(state)) {
            $scope.isWidescreen = state;
        } else {
            $scope.isWidescreen = !$scope.isWidescreen;
        }
        $localStorage.isWidescreen = $scope.isWidescreen;
        $scope.$broadcast('widescreen:toggle');
    };

    // ---

    identity.init();
    identity.promise.then(function () {
        $log.info('Identity', identity.user);
        return $rootScope.appReady = true;
    });

    favicon.init();

    setTimeout(function () {
        return $(window).resize(function () {
            $scope.$apply(function () {
                return $rootScope.$broadcast('window:resize');
            });
        });
    });

    $scope.updateResttime = function () {
        if ($location.path() != '/view/login/normal') {
            $http.get('/api/core/session-time').then(function (resp) {
                $rootScope.resttime = resp.data;
                $rootScope.counter = $scope.convertTime($rootScope.resttime);
                if ($rootScope.resttime > 0 && !angular.isDefined($scope.timeDown)) {
                    $scope.timeDown = $interval($scope.countDown, 1000, 0);
                }
            });
        };
    };

    $scope.updateResttime();

    $scope.countDown = function () {
        if ($rootScope.resttime <= 0) {
            $interval.cancel($scope.timeDown);
            $scope.timeDown = null;
            $window.location.href = '/view/login/normal';
        } else {
            $rootScope.resttime -= 1;
            $rootScope.counter = $scope.convertTime($rootScope.resttime);
        }
    };

    $scope.convertTime = function (seconds) {
        hours = ('00' + Math.floor(seconds / 3600)).slice(-2);
        rest = seconds % 3600;
        minutes = ('00' + Math.floor(rest / 60)).slice(-2);
        seconds = ('00' + rest % 60).slice(-2);
        return [hours, minutes, seconds];
    };
});


'use strict';

angular.module('core').controller('CoreTasksController', function ($scope, socket, tasks, identity) {
    $scope.tasks = tasks;
});


'use strict';

angular.module('core').controller('CoreNavboxController', function ($scope, $http, $location, hotkeys) {
    $scope.results = null;

    hotkeys.on($scope, function (key, event) {
        if (key === 'P' && event.ctrlKey) {
            $scope.visible = true;
            return true;
        }
        return false;
    }, 'keydown');

    $scope.cancel = function () {
        $scope.visible = false;
        $scope.query = null;
    };

    $scope.onSearchboxKeyDown = function ($event) {
        if ($scope.results) {
            if ($event.keyCode === hotkeys.ENTER) {
                $scope.open($scope.results[0]);
            }

            var result = [];

            var len = Math.min($scope.results.length, 10);
            for (var i = 0; j < len; i++) {
                if ($event.keyCode === i.toString().charCodeAt(0) && $event.shiftKey) {
                    $scope.open($scope.results[i]);
                    $event.preventDefault();
                }
            }
        }
    };

    $scope.onSearchboxKeyUp = function ($event) {
        if ($event.keyCode === hotkeys.ESC) {
            $scope.cancel();
        }
    };

    $scope.$watch('query', function () {
        if (!$scope.query) {
            return;
        }
        $http.get('/api/core/navbox/' + $scope.query).then(function (response) {
            return $scope.results = response.data;
        });
    });

    $scope.open = function (result) {
        $location.path(result.url);
        $scope.cancel();
    };
});


'use strict';

angular.module('core').controller('CoreError404', function ($scope, $location) {
    $scope.url = $location.$$absUrl;
});


'use strict';

angular.module('core').directive('autofocus', function ($timeout) {
    return {
        restrict: 'A',
        link: function link(scope, element) {
            $timeout(function () {
                return element[0].focus();
            });
        }
    };
});


'use strict';

angular.module('core').directive('checkbox', function () {
    return {
        restrict: 'EA',
        scope: {
            text: '@',
            toggle: '='
        },
        require: 'ngModel',
        template: "<i class=\"fa fa-square-o off\"></i><i class=\"fa fa-check-square on\"></i> {{text}}",
        link: function link($scope, element, attr, ngModelController) {
            var classToToggle = 'active';

            ngModelController.$render = function () {
                if (ngModelController.$viewValue) {
                    element.addClass(classToToggle);
                } else {
                    element.removeClass(classToToggle);
                }
            };

            element.bind('click', function () {
                return $scope.$apply(function () {
                    ngModelController.$setViewValue(!ngModelController.$viewValue);
                    ngModelController.$render();
                });
            });

            if ($scope.toggle) {
                ngModelController.$formatters.push(function (v) {
                    return v === $scope.toggle[1];
                });
                ngModelController.$parsers.push(function (v) {
                    return v ? $scope.toggle[1] : $scope.toggle[0];
                });
            }
        }
    };
});


'use strict';

angular.module('core').directive('datepickerPopup', function () {
    return {
        restrict: 'EAC',
        require: 'ngModel',
        link: function link(scope, element, attr, controller) {
            controller.$formatters.shift();
        }
    };
});


'use strict';

angular.module('core').directive('dialog', function ($http, $log, $timeout) {
    return {
        restrict: 'E',
        transclude: true,
        template: '\n            <div class="modal">\n                <div class="modal-dialog {{attrs.dialogClass}}">\n                    <div class="modal-content">\n                        <ng-transclude></ng-transclude>\n                    </div>\n                </div>\n            </div>',
        link: function link($scope, element, attrs) {
            element.addClass('block-element');
            $timeout(function () {
                return element.addClass('animate-modal');
            });

            $scope.attrs = attrs;
            $scope.$watch('attrs.ngShow', function () {
                if (attrs.ngShow) {
                    return setTimeout(function () {
                        return element.find('*[autofocus]').focus();
                    });
                }
            });
        }
    };
});


'use strict';

angular.module('core').directive('fitToParent', function () {
    return function ($scope, element, attrs) {
        var parent = element.parent();

        $(window).resize(function () {
            if (angular.isDefined(attrs.fitWidth)) {
                element.width(1);
                element.width(parent.width());
            }
            if (angular.isDefined(attrs.fitHeight)) {
                element.height(1);
                element.height(parent.height());
            }
        });
    };
});


'use strict';

angular.module('core').directive('floatingToolbar', function () {
    return {
        restrict: 'E',
        transclude: true,
        template: '\n            <div class="container">\n                <div class="row">\n                    <div ng:class="{\'col-md-3\': showSidebar}">\n                    </div>\n                    <div ng:class="{\'col-md-9\': showSidebar, \'col-md-12\': !showSidebar}">\n                        <div class="bar row">\n                            <ng-transclude></ng-transclude>\n                        </div>\n                    </div>\n                </div>\n            </div>'
    };
});


'use strict';

angular.module('core').directive('keyboardFocus', function () {
    return function ($scope, element, attrs) {
        return element.bind('keydown', function (event) {
            if (event.keyCode === 40) {
                element.find('*:focus').first().next().focus();
                event.preventDefault();
            }
            if (event.keyCode === 38) {
                element.find('*:focus').first().prev().focus();
                event.preventDefault();
            }
        });
    };
});


'use strict';

angular.module('core').directive('messageboxContainer', function (messagebox) {
    return {
        restrict: 'E',
        template: '\n            <dialog class="messagebox" ng:show="message.visible" ng:repeat="message in messagebox.messages">\n                <div class="modal-header">\n                    <h4>{{message.title|translate}}</h4>\n                </div>\n                <div class="modal-body" ng:class="{scrollable: message.scrollable}">\n                    <div ng:show="message.progress">\n                        <progress-spinner></progress-spinner>\n                    </div>\n                    {{message.text|translate}}\n                    <ng:include ng:if="message.template" src="message.template"></ng:include>\n                    <div ng:show="message.prompt">\n                        <label>{{message.prompt}}</label>\n                        <input type="text" ng:model="message.value" ng:enter="doPositive(message)" class="form-control" autofocus />\n                    </div>\n                </div>\n                <div class="modal-footer">\n                    <a ng:click="doPositive(message)" ng:show="message.positive" class="positive btn btn-default btn-flat">{{message.positive|translate}}</a>\n                    <a ng:click="doNegative(message)" ng:show="message.negative" class="negative btn btn-default btn-flat">{{message.negative|translate}}</a>\n                </div>\n            </dialog>',
        link: function link($scope, element, attrs) {
            $scope.messagebox = messagebox;

            $scope.doPositive = function (msg) {
                msg.q.resolve(msg);
                messagebox.close(msg);
            };

            $scope.doNegative = function (msg) {
                msg.q.reject(msg);
                messagebox.close(msg);
            };
        }
    };
});


'use strict';

angular.module('core').directive('ngEnter', function () {
    return function ($scope, element, attrs) {
        return element.bind('keydown keypress', function (event) {
            if (event.which === 13) {
                $scope.$apply(function () {
                    return $scope.$eval(attrs.ngEnter);
                });
                event.preventDefault();
            }
        });
    };
});


'use strict';

angular.module('core').directive('progressSpinner', function () {
    return {
        restrict: 'E',
        template: '\n            <div>\n                <div class="one"></div>\n                <div class="two"></div>\n            </div>'
    };
});


'use strict';

angular.module('core').directive('rootAccess', function (identity) {
    return {
        restrict: 'A',
        link: function link($scope, element, attr) {
            var template = '\n                <div class="text-center root-access-blocker">\n                    <h1>\n                        <i class="fa fa-lock"></i>\n                    </h1>\n                    <h3 translate>\n                        Superuser access required\n                    </h3>\n                </div>';
            identity.promise.then(function () {
                if (!identity.isSuperuser) {
                    element.empty().append($(template));
                }
            });
        }
    };
});


'use strict';

angular.module('core').directive('coreSidebar', function ($http, $log) {
    return {
        restrict: 'E',
        scope: true,
        template: '\n            <div ng:bind-html="customization.plugins.core.sidebarUpperContent"></div>\n            <ng:include src="\'/core:resources/partial/sidebarItem.html\'" />\n            <div ng:bind-html="customization.plugins.core.sidebarLowerContent"></div>\n        ',
        link: function link($scope, element, attrs) {
            $http.get('/api/core/sidebar').then(function (response) {
                $scope.item = response.data.sidebar;
                $scope.item.expanded = true;
                $scope.item.isRoot = true;
                $scope.item.children.forEach(function (item) {
                    item.expanded = true;
                    item.isTopLevel = true;
                });
            });
        }
    };
});


'use strict';

angular.module('core').directive('smartProgress', function () {
    return {
        restrict: 'E',
        scope: {
            animate: '=?',
            value: '=',
            text: '=?',
            max: '=',
            maxText: '=?',
            type: '@'
        },
        template: '\n            <div>\n                <uib-progressbar type="{{type}}" max="100" value="100 * value / max" animate="animate" ng:class="{indeterminate: !max}">\n                </uib-progressbar>\n            </div>\n            <div class="values">\n                <span class="pull-left no-wrap">{{text}}</span>\n                <span class="pull-right no-wrap">{{maxText}}</span>\n            </div>',
        link: function link($scope, element, attr) {
            $scope.animate = angular.isDefined($scope.animate) ? $scope.animate : true;
            $scope.type = angular.isDefined($scope.type) ? $scope.type : 'warning';
        }
    };
});


'use strict';

angular.module('core').service('config', function ($http, $q, initialConfigContent) {
    var _this = this;

    this.load = function () {
        return $http.get("/api/core/config").then(function (response) {
            return _this.data = response.data;
        });
    };

    this.save = function () {
        return $http.post("/api/core/config", _this.data);
    };

    this.getUserConfig = function () {
        return $http.get("/api/core/user-config").then(function (response) {
            return response.data;
        });
    };

    this.setUserConfig = function (config) {
        return $http.post("/api/core/user-config", config).then(function (response) {
            return response.data;
        });
    };

    this.getAuthenticationProviders = function (config) {
        return $http.post("/api/core/authentication-providers", config).then(function (response) {
            return response.data;
        });
    };

    this.getPermissions = function (config) {
        return $http.post("/api/core/permissions", config).then(function (response) {
            return response.data;
        });
    };

    this.data = initialConfigContent;

    // For compatibility
    this.promise = $q.resolve(this.data);

    return this;
});


'use strict';

angular.module('core').service('core', function ($timeout, $q, $http, $window, messagebox, gettext) {
    var _this = this;

    this.pageReload = function () {
        return $window.location.reload();
    };

    this.restart = function () {
        return messagebox.show({
            title: gettext('Restart'),
            text: gettext('Restart the panel?'),
            positive: gettext('Yes'),
            negative: gettext('No')
        }).then(function () {
            _this.forceRestart();
        });
    };

    this.forceRestart = function () {
        var msg = messagebox.show({ progress: true, title: gettext('Restarting') });
        return $http.get('/api/core/restart-master').then(function () {
            return $timeout(function () {
                msg.close();
                messagebox.show({ title: gettext('Restarted'), text: gettext('Please wait') });
                $timeout(function () {
                    _this.pageReload();
                    return setTimeout(function () {
                        // sometimes this is not enough
                        return _this.pageReload();
                    }, 5000);
                });
            }, 5000);
        }).catch(function (err) {
            msg.close();
            notify.error(gettext('Could not restart'), err.message);
            return $q.reject(err);
        });
    };

    return this;
});


'use strict';

angular.module('core').service('customization', function () {
    this.plugins = { core: {
            extraProfileMenuItems: []
        } };
    return this;
});


'use strict';

angular.module('core').service('favicon', function ($rootScope, identity, customization) {
    var _this = this;

    this.colors = {
        red: '#F44336',
        bluegrey: '#607D8B',
        purple: '#9C27B0',
        blue: '#2196F3',
        default: '#2196F3',
        cyan: '#00BCD4',
        green: '#4CAF50',
        deeporange: '#FF5722',
        orange: '#FF9800',
        teal: '#009688'
    };

    this.set = function (color) {
        $rootScope.themeColorValue = _this.colors[color];

        var canvas = document.createElement('canvas');
        canvas.width = 16;
        canvas.height = 16;
        var context = canvas.getContext('2d');
        if (color) {
            context.fillStyle = _this.colors[color];
            //context.fillRect(4, 4, 8, 8)
            context.fillRect(4, 4, 3, 8);
            context.fillRect(4, 4, 8, 3);
            context.fillRect(9, 4, 3, 8);
            context.fillRect(4, 9, 8, 3);
        } else {
            // use this for something
            context.fillStyle = _this.colors[color];
            context.fillRect(1, 6, 4, 4);
            context.fillRect(6, 6, 4, 4);
            context.fillRect(11, 6, 4, 4);
        }

        _this.setURL(canvas.toDataURL());
    };

    this.setURL = function (url) {
        var link = $('link[rel="shortcut icon"]')[0];
        link.type = 'image/x-icon';
        link.href = url;
    };

    this.init = function () {
        var _this2 = this;

        this.scope = $rootScope.$new();
        this.scope.identity = identity;
        if (customization.plugins.core.faviconURL) {
            this.setURL(customization.plugins.core.faviconURL);
        } else {
            this.scope.$watch('identity.color', function () {
                _this2.set(identity.color);
            });
        }
    };

    return this;
});


'use strict';

angular.module('core').service('feedback', function ($log, ajentiVersion, ajentiPlatform, ajentiPlatformUnmapped, customization) {
    var _this = this;

    this.enabled = customization.plugins.core.enableMixpanel !== false;

    this.token = 'df4919c7cb869910c1e188dbc2918807';

    this.init = function () {
        mixpanel.init(_this.token);
        mixpanel.register({
            version: ajentiVersion,
            platform: ajentiPlatform,
            platformUnmapped: ajentiPlatformUnmapped
        });
    };

    this.emit = function (evt, params) {
        if (_this.enabled) {
            try {
                mixpanel.track(evt, params || {});
            } catch (e) {
                $log.error(e);
            }
        }
    };

    return this;
});


'use strict';

var _ = {};

// angular-gettext defines a stub as a constant, impossible to override it with e.g. factory
angular.module('core').constant('gettext', function (str) {
    return _.gettextCatalog.getString(str);
});

angular.module('core').service('locale', function ($http, gettextCatalog) {
    _.gettextCatalog = gettextCatalog;

    this.setLanguage = function (lang) {
        return $http.get('/resources/all.locale.js?lang=' + lang).then(function (rq) {
            gettextCatalog.setStrings(lang, rq.data);
            return gettextCatalog.setCurrentLanguage(lang);
        });
    };

    return this;
});

angular.module('core').run(function (locale, config) {
    return config.promise.then(function () {
        return locale.setLanguage(config.data.language || 'en');
    });
});


'use strict';

angular.module('core').service('hotkeys', function ($timeout, $window, $rootScope) {
    this.ESC = 27;
    this.ENTER = 13;

    var handler = function handler(e, mode) {
        var isTextField = false;
        if (!e.metaKey && !e.ctrlKey) {
            if ($('input:focus').length > 0 || $('textarea:focus').length > 0) {
                isTextField = true;
            }
        }

        var char = e.which < 32 ? e.which : String.fromCharCode(e.which);
        if (!isTextField) {
            $rootScope.$broadcast(mode, char, e);
        }
        $rootScope.$broadcast(mode + ':global', char, e);
        $rootScope.$apply();
    };

    $timeout(function () {
        $(document).keydown(function (e) {
            return handler(e, 'keydown');
        });
        $(document).keyup(function (e) {
            return handler(e, 'keyup');
        });
        $(document).keypress(function (e) {
            return handler(e, 'keypress');
        });
    });

    this.on = function (scope, handler, mode) {
        return scope.$on(mode || 'keydown', function ($event, key, event) {
            if (handler(key, event)) {
                event.preventDefault();
                return event.stopPropagation();
            }
        });
    };
    return this;
});


'use strict';

angular.module('core').service('identity', function ($http, $location, $window, $timeout, $q, urlPrefix, ajentiBootstrapColor) {
    var _this = this;

    var q = $q.defer();
    this.promise = q.promise;
    this.color = ajentiBootstrapColor;

    this.init = function () {
        return $http.get('/api/core/identity').success(function (data) {
            _this.user = data.identity.user;
            _this.uid = data.identity.uid;
            _this.effective = data.identity.effective;
            _this.elevation_allowed = data.identity.elevation_allowed;
            _this.profile = data.identity.profile;
            _this.machine = data.machine;
            _this.color = data.color;
            _this.isSuperuser = _this.effective === 0;
            q.resolve();
        }).error(function () {
            return q.reject();
        });
    };

    this.auth = function (username, password, mode) {
        var data = {
            username: username,
            password: password,
            mode: mode
        };

        return $http.post('/api/core/auth', data).then(function (response) {
            if (!response.data.success) {
                return $q.reject(response.data.error);
            }
        });
    };

    this.login = function () {
        return $window.location.assign(urlPrefix + '/view/login/normal/' + $location.path());
    };

    this.elevate = function () {
        var _this2 = this;

        $http.get('/api/core/logout');
        return $timeout(function () {
            $window.location.assign(urlPrefix + '/view/login/sudo:' + _this2.user + '/' + $location.path());
        }, 1000);
    };

    this.logout = function () {
        $http.get('/api/core/logout');
        return $timeout(function () {
            $window.location.assign(urlPrefix + '/view/login/normal/' + $location.path());
        }, 1000);
    };

    return this;
});


'use strict';

angular.module('core').service('messagebox', function ($timeout, $q) {
    var _this = this;

    this.messages = [];

    this.show = function (options) {
        var q = $q.defer();
        options.visible = true;
        options.q = q;
        _this.messages.push(options);
        return {
            messagebox: options,
            then: function then(f) {
                return q.promise.then(f);
            },
            catch: function _catch(f) {
                return q.promise.catch(f);
            },
            finally: function _finally(f) {
                return q.promise.finally(f);
            },
            close: function close() {
                return _this.close(options);
            }
        };
    };

    this.prompt = function (prompt, value) {
        value = value || '';
        return _this.show({
            prompt: prompt,
            value: value,
            positive: 'OK',
            negative: 'Cancel'
        });
    };

    this.close = function (msg) {
        msg.visible = false;
        return $timeout(function () {
            _this.messages.remove(msg);
        }, 1000);
    };

    return this;
});


'use strict';

angular.module('core').service('notify', function ($location, toaster) {
    window.toaster = toaster;
    this.info = function (title, text) {
        return toaster.pop('info', title, text);
    };

    this.success = function (title, text) {
        return toaster.pop('success', title, text);
    };

    this.warning = function (title, text) {
        return toaster.pop('warning', title, text);
    };

    this.error = function (title, text) {
        return toaster.pop('error', title, text);
    };

    this.custom = function (style, title, text, url) {
        return toaster.pop(style, title, text, 5000, 'trustedHtml', function () {
            return $location.path(url);
        });
    };

    return this;
});


'use strict';

angular.module('core').service('pageTitle', function ($rootScope) {
    this.set = function (expr, scope) {
        if (!scope) {
            $rootScope.pageTitle = expr;
        } else {
            var refresh = function refresh() {
                var title = scope.$eval(expr);
                if (angular.isDefined(title)) {
                    $rootScope.pageTitle = title;
                }
            };

            scope.$watch(expr, function () {
                return refresh();
            });
            refresh();
        }
    };

    return this;
});


'use strict';

angular.module('core').service('push', function ($rootScope, $q, $log, $http, socket) {
    $rootScope.$on('socket:push', function ($event, msg) {
        $log.debug('Push message from', msg.plugin, msg.message);
        $rootScope.$broadcast('push:' + msg.plugin, msg.message);
    });

    return this;
});


'use strict';

angular.module('core').service('socket', function ($log, $location, $rootScope, $q, socketFactory, urlPrefix) {
    var _this = this;

    this.enabled = true;

    var cfg = {
        resource: (urlPrefix + '/socket.io').substring(1),
        'reconnection limit': 1,
        'max reconnection attempts': 999999
    };

    if (/Apple Computer/.test(navigator.vendor) && location.protocol === 'https:') {
        cfg.transports = ['jsonp-polling']; // Safari can go to hell
    }

    this.socket = socketFactory({
        ioSocket: io.connect('/socket', cfg)
    });

    this.socket.on('connecting', function (e) {
        return $log.log('Socket is connecting');
    });

    this.socket.on('connect_failed', function (e) {
        return $log.log('Socket is connection failed', e);
    });

    this.socket.on('reconnecting', function (e) {
        return $log.log('Socket is reconnecting');
    });

    this.socket.on('reconnect_failed', function (e) {
        return $log.log('Socket reconnection failed', e);
    });

    this.socket.on('reconnect', function (e) {
        $rootScope.socketConnectionLost = false;
        $log.log('Socket has reconnected');
    });

    this.socket.on('connect', function (e) {
        if (!_this.enabled) {
            return;
        }
        $rootScope.socketConnectionLost = false;
        $rootScope.$broadcast('socket-event:connect');
        $log.log('Socket has connected');
    });

    this.socket.on('disconnect', function (e) {
        if (!_this.enabled) {
            return;
        }
        $rootScope.socketConnectionLost = true;
        $rootScope.$broadcast('socket-event:disconnect');
        $log.error('Socket has disconnected', e);
    });

    this.socket.on('error', function (e) {
        $rootScope.socketConnectionLost = true;
        $log.error('Error', e);
    });

    this.send = function (plugin, data) {
        var q = $q.defer();
        var msg = {
            plugin: plugin,
            data: data
        };
        _this.socket.emit('message', msg, function () {
            return q.resolve();
        });
        return q.promise;
    };

    this.socket.on('message', function (msg) {
        if (!_this.enabled) {
            return;
        }
        if (msg[0] === '{') {
            msg = JSON.parse(msg);
        }
        $log.debug('Socket message from', msg.plugin, msg.data);
        $rootScope.$broadcast('socket:' + msg.plugin, msg.data);
    });

    return this;
});


'use strict';

angular.module('core').service('tasks', function ($rootScope, $q, $http, notify, push, socket, gettext) {
    var _this = this;

    this.tasks = [];
    this.deferreds = {};

    $rootScope.$on('socket-event:connect', function () {
        return $http.get('/api/core/tasks/request-update');
    });

    $rootScope.$on('push:tasks', function ($event, msg) {
        if (msg.type === 'update') {
            if (_this.tasks.length > msg.tasks.length) {
                _this.tasks.length = msg.tasks.length;
            }

            for (var i = 0; i < msg.tasks.length; i++) {
                if (_this.tasks.length <= i) {
                    _this.tasks.push({});
                }
                angular.copy(msg.tasks[i], _this.tasks[i]);
            }
        }
        if (msg.type === 'message') {
            if (msg.message.type === 'done') {
                var def = _this.deferreds[msg.message.task.id];
                if (def) {
                    def.resolve();
                }
                notify.success(gettext(msg.message.task.name), gettext('Done'));
            }
            if (msg.message.type === 'exception') {
                var def = _this.deferreds[msg.message.task.id];
                if (def) {
                    def.reject(msg.message);
                }
                return notify.error(gettext(msg.message.task.name), gettext('Failed: ' + msg.message.exception));
            }
        }
    });

    this.start = function (cls, args, kwargs) {
        args = args || [];
        kwargs = kwargs || {};

        var data = {
            cls: cls,
            args: args,
            kwargs: kwargs
        };
        return $http.post('/api/core/tasks/start', data).then(function (response) {
            var def = $q.defer();
            var taskId = response.data;
            _this.deferreds[taskId] = def;

            return { id: taskId, promise: def.promise };
        });
    };

    return this;
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_core/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.passwd', ['core']);


'use strict';

angular.module('ajenti.passwd').service('passwd', function ($http, $q) {
    this.list = function () {
        return $http.get("/api/passwd/list").then(function (response) {
            return response.data;
        });
    };

    this.set = function (user, password) {
        return $http.post("/api/passwd/set", { user: user, password: password }).then(function (response) {
            return response.data;
        });
    };

    return this;
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_passwd/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.ace', ['core', 'ui.ace']);


'use strict';

angular.module('ajenti.ace').directive('aceEditor', function ($timeout, $log) {
    return {
        scope: {
            ngModel: '=',
            options: '=?',
            aceOptions: '=?'
        },
        template: '<div ui-ace="options" ng:model="ngModel"></div>',
        link: function link($scope, element, attrs) {
            element.addClass('block-element');
            if ($scope.options) {
                if ($scope.options.height) {
                    element.height($scope.options.height);
                }
                if ($scope.options.fullScreen) {
                    return element.addClass('full-screen');
                }
            }
        },
        controller: function controller($scope) {
            if ($scope.options == null) $scope.options = {};
            if ($scope.options.useWrapMode == null) $scope.options.useWrapMode = true;
            if ($scope.options.showGutter == null) $scope.options.showGutter = true;
            if ($scope.aceOptions == null) $scope.aceOptions = {};
            if ($scope.aceOptions.theme == null) $scope.aceOptions.theme = 'ace/theme/solarized_dark';
            if ($scope.aceOptions.autoScrollEditorIntoView == null) $scope.aceOptions.autoScrollEditorIntoView = true;
            if ($scope.aceOptions.fontSize == null) $scope.aceOptions.fontSize = '12px';
            if ($scope.aceOptions.maxLines == null) $scope.aceOptions.maxLines = Infinity;
            if ($scope.aceOptions.scrollPastEnd == null) $scope.aceOptions.scrollPastEnd = true;

            ace.config.set('basePath', '/resources/ace/resources/vendor/ace-builds/src-min-noconflict');

            $scope.options.onLoad = function (ace) {
                $log.debug('Ace editor loaded');
                $scope.ace = ace;
                $scope.ace.$blockScrolling = Infinity;
                $scope.ace.setOptions($scope.aceOptions);
                return $scope.ace.resize();
            };

            return $scope.$on('ace:reload', function ($event, path) {
                $log.debug('Guessing mode for ' + path);
                return $timeout(function () {
                    var modelist = ace.require('ace/ext/modelist');

                    var _modelist$getModeForP = modelist.getModeForPath(path),
                        mode = _modelist$getModeForP.mode;

                    return $scope.ace.getSession().setMode(mode);
                });
            });
        }
    };
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_ace/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.plugins', ['core']);


'use strict';

angular.module('core').config(function ($routeProvider) {
    $routeProvider.when('/view/plugins', {
        templateUrl: '/plugins:resources/partial/index.html',
        controller: 'PluginsIndexController'
    });
});

angular.module('ajenti.plugins').controller('PluginsIndexController', function ($scope, $q, $http, $rootScope, notify, pageTitle, messagebox, tasks, core, gettext) {
    pageTitle.set('Plugins');

    $scope.selectedInstalledPlugin = null;
    $scope.selectedRepoPlugin = null;
    $scope.coreUpgradeAvailable = null;

    $scope.selectRepoPlugin = function (plugin) {
        return $scope.selectedRepoPlugin = plugin;
    };

    $scope.needUpgrade = function (local_version, repo_version) {
        if (repo_version === null) {
            notify.error(gettext('Could not load repository version for ajenti-panel.'));
            return false;
        }
        if (local_version === repo_version) {
            return false;
        }
        details_local = local_version.split('.');
        details_repo = repo_version.split('.');
        min_array_len = Math.min(details_local.length, details_repo.length);
        for (var i = 0; i <= min_array_len; i++) {
            if (parseInt(details_local[i]) < parseInt(details_repo[i])) {
                return true;
            }
            // For special developer case ...
            if (parseInt(details_local[i]) > parseInt(details_repo[i])) {
                return false;
            }
        }
        // At this point, all minimal details values are equals, like e.g. 1.32 and 1.32.4
        if (details_local.length < details_repo.length) {
            return true;
        }
        return false;
    };

    $scope.refresh = function () {
        $http.get('/api/plugins/list/installed').success(function (data) {
            $scope.installedPlugins = data;
            $scope.repoList = null;
            $scope.repoListOfficial = null;
            $scope.repoListCommunity = null;
            $http.get('/api/plugins/getpypi/list').success(function (data) {
                $scope.repoList = data;
                $scope.notInstalledRepoList = $scope.repoList.filter(function (x) {
                    return !$scope.isInstalled(x);
                }).map(function (x) {
                    return x;
                });
                $scope.repoListOfficial = $scope.repoList.filter(function (x) {
                    return x.type === "official";
                }).map(function (x) {
                    return x;
                });
                $scope.repoListCommunity = $scope.repoList.filter(function (x) {
                    return x.type !== "official";
                }).map(function (x) {
                    return x;
                });
            }, function (err) {
                notify.error(gettext('Could not load plugin repository'), err.message);
            });
        }, function (err) {
            notify.error(gettext('Could not load the installed plugin list'), err.message);
        });

        $http.get('/api/plugins/core/check-upgrade').success(function (data) {
            return $scope.coreUpgradeAvailable = $scope.needUpgrade($rootScope.ajentiVersion, data);
        });

        $scope.pypiList = null;
        $http.get('/api/plugins/pypi/list').success(function (data) {
            return $scope.pypiList = data;
        });
    };

    $scope.refresh();

    $scope.isInstalled = function (plugin) {
        if (!$scope.isInstalled) {
            return false;
        }
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = $scope.installedPlugins[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var p = _step.value;

                if (p.name === plugin.name) {
                    return true;
                }
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        return false;
    };

    $scope.isUninstallable = function (plugin) {
        return $scope.pypiList && $scope.pypiList[plugin.name] && plugin.name !== 'core';
    };

    $scope.isAnythingUpgradeable = function () {
        if (!$scope.installedPlugins) {
            return false;
        }
        if ($scope.coreUpgradeAvailable) {
            return true;
        }
        var _iteratorNormalCompletion2 = true;
        var _didIteratorError2 = false;
        var _iteratorError2 = undefined;

        try {
            for (var _iterator2 = $scope.installedPlugins[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
                var p = _step2.value;

                if ($scope.getUpgrade(p)) {
                    return true;
                }
            }
        } catch (err) {
            _didIteratorError2 = true;
            _iteratorError2 = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion2 && _iterator2.return) {
                    _iterator2.return();
                }
            } finally {
                if (_didIteratorError2) {
                    throw _iteratorError2;
                }
            }
        }

        return false;
    };

    $scope.upgradeEverything = function () {
        return tasks.start('aj.plugins.plugins.tasks.UpgradeAll', [], {}).then(function (data) {
            return data.promise;
        }).then(function () {
            notify.success(gettext('All plugins updated'));
            messagebox.show({
                title: gettext('Done'),
                text: gettext('Installed. A panel restart is required.'),
                positive: gettext('Restart now'),
                negative: gettext('Later')
            }).then(function () {
                return core.forceRestart();
            });
        }).catch(function () {
            notify.error(gettext('Some plugins failed to update'));
        });
    };

    $scope.getUpgrade = function (plugin) {
        if (!$scope.repoList || !plugin) {
            return null;
        }
        var _iteratorNormalCompletion3 = true;
        var _didIteratorError3 = false;
        var _iteratorError3 = undefined;

        try {
            for (var _iterator3 = $scope.repoList[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
                var p = _step3.value;

                if (p.name === plugin.name && $scope.needUpgrade(plugin.version, p.version)) {
                    return p;
                }
            }
        } catch (err) {
            _didIteratorError3 = true;
            _iteratorError3 = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion3 && _iterator3.return) {
                    _iterator3.return();
                }
            } finally {
                if (_didIteratorError3) {
                    throw _iteratorError3;
                }
            }
        }

        return null;
    };

    $scope.installPlugin = function (plugin) {
        $scope.selectedRepoPlugin = null;
        $scope.selectedInstalledPlugin = null;
        var msg = messagebox.show({ progress: true, title: 'Installing' });
        upgradeInfo = $scope.getUpgrade(plugin);
        if (upgradeInfo !== null) {
            if (upgradeInfo.version != plugin.version) version = upgradeInfo.version;
        } else version = plugin.version;
        return tasks.start('aj.plugins.plugins.tasks.InstallPlugin', [], { name: plugin.name, version: version }).then(function (data) {
            data.promise.then(function () {
                $scope.refresh();
                messagebox.show({ title: gettext('Done'), text: gettext('Installed. A panel restart is required.'), positive: gettext('Restart now'), negative: gettext('Later') }).then(function () {
                    return core.forceRestart();
                });
                return null;
            }, function (e) {
                notify.error(gettext('Install failed'), e.error);
            }).finally(function () {
                return msg.close();
            });
        });
    };

    $scope.uninstallPlugin = function (plugin) {
        if (plugin.name === 'plugins') {
            return messagebox.show({
                title: gettext('Warning'),
                text: gettext('This will remove the Plugins plugin. You can reinstall it later using PIP.'),
                positive: gettext('Continue'),
                negative: gettext('Cancel')
            }).then(function () {
                return $scope.doUninstallPlugin(plugin);
            });
        } else {
            return $scope.doUninstallPlugin(plugin);
        }
    };

    $scope.doUninstallPlugin = function (plugin) {
        $scope.selectedRepoPlugin = null;
        $scope.selectedInstalledPlugin = null;
        return messagebox.show({
            title: gettext('Uninstall'),
            text: gettext('Uninstall ' + plugin.name + '?'),
            positive: gettext('Uninstall'),
            negative: gettext('Cancel')
        }).then(function () {
            var msg = messagebox.show({ progress: true, title: gettext('Uninstalling') });
            return $http.get('/api/plugins/pypi/uninstall/' + plugin.name).success(function () {
                $scope.refresh();
                return messagebox.show({
                    title: gettext('Done'),
                    text: gettext('Uninstalled. A panel restart is required.'),
                    positive: gettext('Restart now'),
                    negative: gettext('Later')
                }).then(function () {
                    core.forceRestart();
                });
            }, function (err) {
                notify.error(gettext('Uninstall failed'), err.message);
            }).finally(function () {
                msg.close();
            });
        });
    };

    $scope.restart = function () {
        return core.restart();
    };
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_plugins/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.dashboard', ['core']);

angular.module('ajenti.dashboard').run(function (customization) {
    customization.plugins.dashboard = {
        allowMove: true,
        allowRemove: true,
        allowConfigure: true,
        allowAdd: true,
        defaultConfig: {
            widgetsLeft: [{
                id: 'w1',
                typeId: 'hostname'

            }, {
                id: 'w2',
                typeId: 'cpu'
            }, {
                id: 'w3',
                typeId: 'loadavg'
            }],
            widgetsRight: [{
                id: 'w4',
                typeId: 'uptime'
            }, {
                id: 'w5',
                typeId: 'memory'
            }]
        }
    };
});


'use strict';

angular.module('core').config(function ($routeProvider) {
    $routeProvider.when('/view/dashboard', {
        templateUrl: '/dashboard:resources/partial/index.html',
        controller: 'DashboardIndexController'
    });
});


'use strict';

angular.module('ajenti.dashboard').controller('DashboardIndexController', function ($scope, $interval, gettext, notify, pageTitle, customization, messagebox, dashboard, config) {
    pageTitle.set(gettext('Dashboard'));

    $scope.ready = false;
    $scope._ = {};

    dashboard.getAvailableWidgets().then(function (data) {
        $scope.availableWidgets = data;
        $scope.widgetTypes = {};
        data.forEach(function (w) {
            return $scope.widgetTypes[w.id] = w;
        });
    });

    $scope.addWidget = function (index, widget) {
        widget = {
            id: Math.floor(Math.random() * 0x10000000).toString(16),
            typeId: widget.id
        };
        $scope.userConfig.dashboard.tabs[index].widgetsLeft.push(widget);
        return $scope.save().then(function () {
            if (widget.config_template) {
                $scope.configureWidget(widget);
            }
            $scope.refresh();
        });
    };

    config.getUserConfig().then(function (userConfig) {
        $scope.userConfig = userConfig;
        $scope.userConfig.dashboard = $scope.userConfig.dashboard || customization.plugins.dashboard.defaultConfig;

        if (!$scope.userConfig.dashboard.tabs) {
            $scope.userConfig.dashboard.tabs = [{
                name: 'Home',
                width: 2,
                widgetsLeft: $scope.userConfig.dashboard.widgetsLeft,
                widgetsRight: $scope.userConfig.dashboard.widgetsRight
            }];
            delete $scope.userConfig.dashboard['widgetsLeft'];
            delete $scope.userConfig.dashboard['widgetsRight'];
        }

        var updateInterval = $interval(function () {
            return $scope.refresh();
        }, 1000);

        $scope.$on('$destroy', function () {
            return $interval.cancel(updateInterval);
        });
    });

    $scope.onSort = function () {
        return $scope.save();
    };

    $scope.refresh = function () {
        var rq = [];
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = $scope.userConfig.dashboard.tabs[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var tab = _step.value;
                var _iteratorNormalCompletion2 = true;
                var _didIteratorError2 = false;
                var _iteratorError2 = undefined;

                try {
                    for (var _iterator2 = tab.widgetsLeft.concat(tab.widgetsRight)[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
                        var widget = _step2.value;

                        rq.push({
                            id: widget.id,
                            typeId: widget.typeId,
                            config: widget.config || {}
                        });
                    }
                } catch (err) {
                    _didIteratorError2 = true;
                    _iteratorError2 = err;
                } finally {
                    try {
                        if (!_iteratorNormalCompletion2 && _iterator2.return) {
                            _iterator2.return();
                        }
                    } finally {
                        if (_didIteratorError2) {
                            throw _iteratorError2;
                        }
                    }
                }
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        dashboard.getValues(rq).then(function (data) {
            $scope.ready = true;
            data.forEach(function (resp) {
                return $scope.$broadcast('widget-update', resp.id, resp.data);
            });
        });
    };

    $scope.addTab = function (index) {
        return messagebox.prompt(gettext('New name')).then(function (msg) {
            if (!msg.value) {
                return;
            }
            $scope.userConfig.dashboard.tabs.push({
                widgetsLeft: [],
                widgetsRight: [],
                name: msg.value
            });
            $scope.save();
        });
    };

    $scope.removeTab = function (index) {
        messagebox.show({
            text: gettext('Remove the \'' + $scope.userConfig.dashboard.tabs[index].name + '\' tab?'),
            positive: gettext('Remove'),
            negative: gettext('Cancel')
        }).then(function () {
            $scope.userConfig.dashboard.tabs.splice(index, 1);
            $scope.save();
        });
    };

    $scope.renameTab = function (index) {
        var tab = $scope.userConfig.dashboard.tabs[index];
        messagebox.prompt(gettext('New name'), tab.name).then(function (msg) {
            if (!msg.value) {
                return;
            }
            tab.name = msg.value;
            $scope.save();
        });
    };

    $scope.configureWidget = function (widget) {
        widget.config = widget.config || {};
        $scope.configuredWidget = widget;
    };

    $scope.saveWidgetConfig = function () {
        $scope.save().then(function () {
            return $scope.refresh();
        });
        $scope.configuredWidget = null;
    };

    $scope.removeWidget = function (tab, widget) {
        tab.widgetsLeft.remove(widget);
        tab.widgetsRight.remove(widget);
        $scope.save();
    };

    $scope.save = function () {
        return config.setUserConfig($scope.userConfig);
    };
});


'use strict';

angular.module('ajenti.dashboard').controller('CPUWidgetController', function ($scope) {
    $scope.$on('widget-update', function ($event, id, data) {
        if (id !== $scope.widget.id) {
            return;
        }
        $scope.avg = 0;
        $scope.cores = 0;
        for (var i = 0; i < data.length; i++) {
            var x = data[i];
            $scope.avg += x / data.length;
            if (x > 0) {
                $scope.cores += 1;
            }
        }
        $scope.avgPercent = Math.floor($scope.avg * 100);
        $scope.values = data;
    });
});


'use strict';

angular.module('ajenti.dashboard').controller('HostnameWidgetController', function ($scope) {
    $scope.$on('widget-update', function ($event, id, data) {
        if (id !== $scope.widget.id) {
            return;
        }
        $scope.hostname = data;
    });
});


'use strict';

angular.module('ajenti.dashboard').controller('LoadAverageWidgetController', function ($scope) {
    $scope.$on('widget-update', function ($event, id, data) {
        if (id !== $scope.widget.id) {
            return;
        }
        $scope.load = data;
    });
});


'use strict';

angular.module('ajenti.dashboard').controller('MemoryWidgetController', function ($scope) {
    $scope.$on('widget-update', function ($event, id, data) {
        if (id !== $scope.widget.id) {
            return;
        }
        $scope.used = data.used;
        $scope.total = data.total;
        $scope.usage = Math.floor(100 * $scope.used / $scope.total);
    });
});


'use strict';

angular.module('ajenti.dashboard').controller('UptimeWidgetController', function ($scope) {
    $scope.$on('widget-update', function ($event, id, data) {
        if (id !== $scope.widget.id) {
            return;
        }
        $scope.uptime = data;
    });
});


'use strict';

angular.module('ajenti.dashboard').service('dashboard', function ($http, $q) {
    this.getAvailableWidgets = function () {
        return $http.get("/api/dashboard/widgets").then(function (response) {
            return response.data;
        });
    };

    this.getValues = function (data) {
        return $http.post("/api/dashboard/get-values", data, { ignoreLoadingBar: true }).then(function (response) {
            return response.data;
        });
    };

    return this;
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_dashboard/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.filesystem', ['core', 'flow']);


'use strict';

angular.module('ajenti.filesystem').controller('DiskWidgetController', function ($scope) {
    return $scope.$on('widget-update', function ($event, id, data) {
        if (id !== $scope.widget.id) {
            return;
        }
        return $scope.service = data;
    });
});

angular.module('ajenti.filesystem').controller('DiskWidgetConfigController', function ($scope, filesystem) {
    $scope.services = [];

    return filesystem.mountpoints().then(function (data) {
        return $scope.mountpoints = data;
    });
});


'use strict';

angular.module('ajenti.filesystem').directive('fileDialog', function ($timeout, filesystem, notify, hotkeys, identity, gettext) {
    return {
        scope: {
            ngShow: "=?",
            onSelect: "&",
            onCancel: "&?",
            root: '=?',
            mode: '@?',
            name: '=?',
            path: '=?'
        },
        templateUrl: '/filesystem:resources/js/directives/fileDialog.html',
        link: function link($scope, element, attrs) {
            element.addClass('block-element');
            $scope.loading = false;
            if ($scope.mode == null) {
                $scope.mode = 'open';
            }
            if ($scope.path == null) {
                $scope.path = '/';
            }

            $scope.navigate = function (path, explicit) {
                $scope.loading = true;
                return filesystem.list(path).then(function (data) {
                    $scope.loadedPath = path;
                    $scope.path = path;
                    $scope.items = data.items;
                    $scope.parent = data.parent;
                    if ($scope.path === $scope.root) {
                        $scope.parent = null;
                    } else if ($scope.path.indexOf($scope.root) !== 0) {
                        $scope.navigate($scope.root);
                    }
                    return $scope.restoreFocus();
                }).catch(function (data) {
                    if (explicit) {
                        return notify.error(gettext('Could not load directory'), data.message);
                    }
                }).finally(function () {
                    return $scope.loading = false;
                });
            };

            $scope.select = function (item) {
                if (item.isDir) {
                    return $scope.navigate(item.path, true);
                } else {
                    if ($scope.mode === 'open') {
                        $scope.onSelect({ path: item.path });
                    }
                    if ($scope.mode === 'save') {
                        return $scope.name = item.name;
                    }
                }
            };

            $scope.save = function () {
                return $scope.onSelect({ path: $scope.path + '/' + $scope.name });
            };

            $scope.selectDirectory = function () {
                return $scope.onSelect({ path: $scope.path });
            };

            hotkeys.on($scope, function (char) {
                if ($scope.ngShow && char === hotkeys.ESC) {
                    $scope.onCancel();
                    return true;
                }
            });

            $scope.restoreFocus = function () {
                return setTimeout(function () {
                    return element.find('.list-group a').first().blur().focus();
                });
            };

            return identity.promise.then(function () {
                if ($scope.root == null) {
                    $scope.root = identity.profile.fs_root || '/';
                }

                $scope.$watch('ngShow', function () {
                    if ($scope.ngShow) {
                        return $scope.restoreFocus();
                    }
                });

                $scope.$watch('root', function () {
                    return $scope.navigate($scope.root);
                });

                return $scope.$watch('path', function () {
                    if ($scope.loadedPath !== $scope.path) {
                        return $scope.navigate($scope.path);
                    }
                });
            });
        }
    };
});


'use strict';

angular.module('ajenti.filesystem').directive('pathSelector', function () {
    return {
        restrict: 'E',
        scope: {
            ngModel: '=',
            mode: '@'
        },
        template: '<div>\n    <div class="input-group">\n        <input ng:model="ngModel" type="text" class="form-control" ng:required="attr.required" />\n        <span class="input-group-addon">\n            <a ng:click="openDialogVisible = true"><i class="fa fa-folder-open"></i></a>\n        </span>\n    </div>\n    <file-dialog\n        mode="{{mode}}"\n        path="\'/\'"\n        ng:show="openDialogVisible"\n        on-select="select(path)"\n        on-cancel="openDialogVisible = false" />\n</div>',
        link: function link($scope, element, attr, ctrl) {
            $scope.attr = attr;
            $scope.path = '/';
            if ($scope.mode == null) {
                $scope.mode = 'open';
            }

            $scope.select = function (path) {
                $scope.ngModel = path;
                return $scope.openDialogVisible = false;
            };

            return $scope.$watch('ngModel', function () {
                if ($scope.ngModel) {
                    if ($scope.mode === 'directory') {
                        return $scope.path = $scope.ngModel;
                    } else {
                        return $scope.path = $scope.ngModel.substr(0, $scope.ngModel.lastIndexOf('/'));
                    }
                }
            });
        }
    };
});


'use strict';

angular.module('ajenti.filesystem').service('filesystem', function ($rootScope, $http, $q) {
    this.mountpoints = function () {
        return $http.get("/api/filesystem/mountpoints").then(function (response) {
            return response.data;
        });
    };

    this.read = function (path, encoding) {
        return $http.get('/api/filesystem/read/' + path + '?encoding=' + (encoding || 'utf-8')).then(function (response) {
            return response.data;
        });
    };

    this.write = function (path, content, encoding) {
        return $http.post('/api/filesystem/write/' + path + '?encoding=' + (encoding || 'utf-8'), content).then(function (response) {
            return response.data;
        });
    };

    this.list = function (path) {
        return $http.get('/api/filesystem/list/' + path).then(function (response) {
            return response.data;
        });
    };

    this.stat = function (path) {
        return $http.get('/api/filesystem/stat/' + path).then(function (response) {
            return response.data;
        });
    };

    this.chmod = function (path, mode) {
        return $http.post('/api/filesystem/chmod/' + path, { mode: mode }).then(function (response) {
            return response.data;
        });
    };

    this.createFile = function (path) {
        return $http.post('/api/filesystem/create-file/' + path);
    };

    this.createDirectory = function (path) {
        return $http.post('/api/filesystem/create-directory/' + path);
    };

    this.downloadBlob = function (content, mime, name) {
        return setTimeout(function () {
            var blob = new Blob([content], { type: mime });
            var elem = window.document.createElement('a');
            elem.href = URL.createObjectURL(blob);
            elem.download = name;
            document.body.appendChild(elem);
            elem.click();
            document.body.removeChild(elem);
        });
    };

    this.startFlowUpload = function ($flow, path) {
        q = $q.defer();
        $flow.on('fileProgress', function (file, chunk) {
            $rootScope.$apply(function () {
                q.notify($flow.files[0].progress());
            });
        });
        $flow.on('complete', async function () {
            $flow.off('complete');
            $flow.off('fileProgress');
            var response = await $http.post('/api/filesystem/finish-upload', {
                id: $flow.files[0].uniqueIdentifier, path: path, name: $flow.files[0].name
            });
            $rootScope.$apply(function () {
                q.resolve(response.data);
            });
            $flow.cancel();
        });

        $flow.upload();
        return q.promise;
    };

    return this;
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_filesystem/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.services', ['core']);


'use strict';

angular.module('core').config(function ($routeProvider) {
    $routeProvider.when('/view/services', {
        templateUrl: '/services:resources/partial/index.html',
        controller: 'ServicesIndexController'
    });

    $routeProvider.when('/view/services/:managerId', {
        templateUrl: '/services:resources/partial/index.html',
        controller: 'ServicesIndexController'
    });
});


'use strict';

angular.module('ajenti.services').controller('ServicesIndexController', function ($scope, $routeParams, notify, pageTitle, services, gettext) {
    pageTitle.set(gettext('Services'));

    $scope.services = [];

    services.getManagers().then(function (managers) {
        $scope.managers = managers;

        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = $scope.managers[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var manager = _step.value;

                if ($routeParams.managerId && manager.id !== $routeParams.managerId) {
                    continue;
                }
                services.getServices(manager.id).then(function (services) {
                    var _iteratorNormalCompletion2 = true;
                    var _didIteratorError2 = false;
                    var _iteratorError2 = undefined;

                    try {
                        for (var _iterator2 = services[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
                            var service = _step2.value;

                            $scope.services.push(service);
                        }
                    } catch (err) {
                        _didIteratorError2 = true;
                        _iteratorError2 = err;
                    } finally {
                        try {
                            if (!_iteratorNormalCompletion2 && _iterator2.return) {
                                _iterator2.return();
                            }
                        } finally {
                            if (_didIteratorError2) {
                                throw _iteratorError2;
                            }
                        }
                    }
                });
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }
    });

    $scope.runOperation = function (service, operation) {
        return services.runOperation(service, operation).then(function () {
            return services.getService(service.managerId, service.id).then(function (data) {
                angular.copy(data, service);
                return notify.success(gettext('Done'));
            });
        }).catch(function (err) {
            return notify.error(gettext('Service operation failed'), err.message);
        });
    };
});


'use strict';

angular.module('ajenti.services').controller('ServiceWidgetController', function ($scope, services, notify, gettext) {
    $scope.$on('widget-update', function ($event, id, data) {
        if (id !== $scope.widget.id) {
            return;
        }
        $scope.service = data;
    });

    $scope.runOperation = function (o) {
        var svc = {
            managerId: $scope.widget.config.manager_id,
            id: $scope.widget.config.service_id
        };
        services.runOperation(svc, o).catch(function (e) {
            return notify.error(gettext('Service operation failed'), e.message);
        });
    };
});

angular.module('ajenti.services').controller('ServiceWidgetConfigController', function ($scope, services) {
    $scope.services = [];

    services.getManagers().then(function (managers) {
        $scope.managers = managers;

        $scope.managers.forEach(function (manager) {
            return services.getServices(manager.id).then(function (services) {
                return services.map(function (service) {
                    return $scope.services.push(service);
                });
            });
        });
    });
});


'use strict';

angular.module('ajenti.services').service('services', function ($http) {
    this.getManagers = function () {
        return $http.get("/api/services/managers").then(function (response) {
            return response.data;
        });
    };

    this.getServices = function (managerId) {
        return $http.get('/api/services/list/' + managerId).then(function (response) {
            return response.data;
        });
    };

    this.getService = function (managerId, serviceId) {
        return $http.get('/api/services/get/' + managerId + '/' + serviceId).then(function (response) {
            return response.data;
        });
    };

    this.runOperation = function (service, operation) {
        return $http.get('/api/services/do/' + operation + '/' + service.managerId + '/' + service.id).then(function (response) {
            return response.data;
        });
    };

    return this;
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_services/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.terminal', ['core', 'ajenti.ace']);


'use strict';

angular.module('core').config(function ($routeProvider) {
    $routeProvider.when('/view/terminal', {
        templateUrl: '/terminal:resources/partial/index.html',
        controller: 'TerminalIndexController'
    });

    return $routeProvider.when('/view/terminal/:id', {
        templateUrl: '/terminal:resources/partial/view.html',
        controller: 'TerminalViewController'
    });
});


'use strict';

var colors = {
    normal: {
        black: '#073642',
        white: '#eee8d5',
        green: '#859900',
        brown: '#af8700',
        red: '#dc322f',
        magenta: '#d33682',
        violet: '#6c71c4',
        blue: '#268bd2',
        cyan: '#2aa198'
    },
    bright: {
        black: '#074a5c',
        white: '#f6f2e6',
        green: '#bbd320',
        brown: '#efbc10',
        red: '#e5423f',
        magenta: '#dd458f',
        violet: '#7a7fd0',
        blue: '#3198e1',
        cyan: '#2abbb0'
    }
};

angular.module('ajenti.terminal').directive('terminal', function ($timeout, $log, $q, socket, notify, terminals, hotkeys, gettext) {
    return {
        scope: {
            id: '=?',
            onReady: '&?',
            textData: '=?'
        },
        template: '<div>\n<canvas></canvas>\n<div class="paste-area" ng:class="{focus: pasteAreaFocused}">\n    <i class="fa fa-paste"></i>\n    <span ng:show="pasteAreaFocused">\n        Paste now\n    </span>\n\n    <textarea\n        ng:model="pasteData"\n        ng:focus="pasteAreaFocused = true"\n        ng:blur="pasteAreaFocused = false"\n    ></textarea>\n</div>\n\n<textarea\n    class="mobile-input-area"\n    ng:if="isMobile"\n    autocomplete="off"\n    autocorrect="off"\n    autocapitalize="off"\n    spellcheck="false"\n></textarea>\n\n<a class="extra-keyboard-toggle btn btn-default" ng:click="extraKeyboardVisible=!extraKeyboardVisible" ng:show="isMobile">\n    <i class="fa fa-keyboard-o"></i>\n</a>\n\n<div class="extra-keyboard" ng:show="extraKeyboardVisible">\n    <a class="btn btn-default" ng:click="extraKeyboardCtrl = true" ng:class="{active: extraKeyboardCtrl}">\n        Ctrl\n    </a>\n    <a class="btn btn-default" ng:click="fakeKeyEvent(38)">\n        <i class="fa fa-arrow-up"></i>\n    </a>\n    <a class="btn btn-default" ng:click="fakeKeyEvent(40)">\n        <i class="fa fa-arrow-down"></i>\n    </a>\n    <a class="btn btn-default" ng:click="fakeKeyEvent(37)">\n        <i class="fa fa-arrow-left"></i>\n    </a>\n    <a class="btn btn-default" ng:click="fakeKeyEvent(39)">\n        <i class="fa fa-arrow-right"></i>\n    </a>\n</div>\n</div>',
        link: function link($scope, element, attrs) {
            element.addClass('block-element');

            $scope.isMobile = new MobileDetect(window.navigator.userAgent).mobile();
            $scope.extraKeyboardVisible = false;

            $scope.charWidth = 7;
            $scope.charHeight = 14;
            $scope.canvas = element.find('canvas')[0];
            $scope.context = $scope.canvas.getContext('2d');
            $scope.font = '12px monospace';
            $scope.ready = false;
            $scope.textLines = [];
            $scope.pasteData = null;

            $scope.clear = function () {
                $scope.dataWidth = 0;
                $scope.dataHeight = 0;
            };

            $scope.fullReload = function () {
                return terminals.full($scope.id).then(function (data) {
                    if (!data) {
                        return $q.reject();
                    }

                    socket.send('terminal', {
                        action: 'subscribe',
                        id: $scope.id
                    });

                    $scope.clear();
                    $scope.draw(data);

                    if (!$scope.ready) {
                        $scope.ready = true;
                        $scope.onReady();
                        $timeout(function () {
                            return (// reflow
                                $scope.autoResize()
                            );
                        });
                    }
                });
            };

            $scope.clear();
            $scope.fullReload().catch(function () {
                $scope.disabled = true;
                $scope.onReady();
                notify.info(gettext('Terminal was closed'));
            });

            $scope.scheduleResize = function (w, h) {
                $timeout.cancel($scope.resizeTimeout);
                $scope.resizeTimeout = $timeout(function () {
                    return $scope.resize(w, h);
                }, 1000);
            };

            $scope.resize = function (w, h) {
                socket.send('terminal', {
                    action: 'resize',
                    id: $scope.id,
                    width: w,
                    height: h
                });
                $scope.canvas.width = $scope.charWidth * w;
                $scope.canvas.height = $scope.charHeight * h;
                $scope.fullReload();
            };

            $scope.autoResize = function () {
                var availableWidth = element.parent().width() - 40;
                var availableHeight = $(window).height() - 60 - 40;
                var cols = Math.floor(availableWidth / $scope.charWidth);
                var rows = Math.floor(availableHeight / $scope.charHeight);
                $scope.scheduleResize(cols, rows);
            };

            $scope.$on('window:resize', $scope.autoResize);

            $scope.$on('navigation:toggle', function () {
                return $timeout(function () {
                    return (// reflow
                        $scope.autoResize()
                    );
                });
            });

            $scope.$on('widescreen:toggle', function () {
                return $timeout(function () {
                    return (// reflow
                        $scope.autoResize()
                    );
                });
            });

            $scope.$on('terminal:paste', function () {
                return element.find('textarea').focus();
            });

            $scope.$on('socket:terminal', function ($event, data) {
                if (data.id !== $scope.id || $scope.disabled) {
                    return;
                }
                if (data.type === 'closed') {
                    $scope.disabled = true;
                    notify.info(gettext('Terminal was closed'));
                }
                if (data.type === 'data') {
                    $scope.draw(data.data);
                }
            });

            $scope.draw = function (data) {
                //console.log 'Payload', data

                if ($scope.dataWidth !== data.w || $scope.dataHeight !== data.h) {
                    $scope.dataWidth = data.w;
                    $scope.dataHeight = data.h;
                }

                $scope.cursor = data.cursor;
                if (data.cursor) {
                    $scope.cursx = data.cx;
                    $scope.cursy = data.cy;
                } else {
                    $scope.cursx = -1;
                }

                $scope.context.font = $scope.font;
                $scope.context.textBaseline = 'top';

                for (var y in data.lines) {
                    var row = data.lines[y];
                    var line = '';

                    for (var x in row) {
                        var cell = row[x];
                        if (cell) {
                            line += cell[0];
                        }
                    }
                    $scope.textLines[parseInt(y)] = line;
                }

                $scope.textData = $scope.textLines.join('\n');

                var lns = element.find('div');
                for (y in data.lines) {
                    var _row = data.lines[y];
                    y = parseInt(y);

                    $scope.context.fillStyle = colors.normal.black;
                    $scope.context.fillRect(0, $scope.charHeight * y, $scope.charWidth * $scope.dataWidth, $scope.charHeight);

                    for (var _x = 0; _x < _row.length; _x++) {
                        var _cell = _row[_x];

                        if (!_cell) {
                            continue;
                        }

                        var defaultFG = 'white';
                        var defaultBG = 'black';

                        if (_cell[7]) {
                            // reverse
                            var t = _cell[1];
                            _cell[1] = _cell[2];
                            _cell[2] = t;
                            defaultFG = 'black';
                            defaultBG = 'white';
                        }

                        if (_cell[3]) {
                            $scope.context.font = 'bold ' + $scope.context.font;
                        }
                        if (_cell[4]) {
                            $scope.context.font = 'italic ' + $scope.context.font;
                        }

                        if (_cell[2]) {
                            if (_cell[2] !== 'default' || _cell[7]) {
                                $scope.context.fillStyle = colors.normal[_cell[2]] || colors.normal[defaultBG];
                                $scope.context.fillRect($scope.charWidth * _x, $scope.charHeight * y, $scope.charWidth, $scope.charHeight);
                            }
                        }

                        if (y === $scope.cursy && _x === $scope.cursx) {
                            $scope.context.fillStyle = colors.normal['white'];
                            $scope.context.fillRect($scope.charWidth * _x, $scope.charHeight * y, $scope.charWidth, $scope.charHeight);
                        }

                        if (_cell[1]) {
                            var colorMap = _cell[3] ? colors.bright : colors.normal;
                            $scope.context.fillStyle = colorMap[_cell[1]] || colorMap[defaultFG];
                            $scope.context.fillText(_cell[0], $scope.charWidth * _x, $scope.charHeight * y);
                            if (_cell[5]) {
                                $scope.context.fillRect($scope.charWidth * _x, $scope.charHeight * (y + 1) - 1, $scope.charWidth, 1);
                            }
                        }

                        if (_cell[3] || _cell[4]) {
                            $scope.context.font = $scope.font;
                        }
                    }
                }
            };

            $scope.parseKey = function (event, event_name, ign_arrows) {
                var ch = null;

                if (event.ctrlKey && event.keyCode === 17) {
                    // ctrl-V
                    return;
                }

                if (event.ctrlKey && event.keyCode > 64) {
                    return String.fromCharCode(event.keyCode - 64);
                }

                //$log.log event

                if (event_name === 'keypress' && (event.charCode || event.which)) {
                    ch = String.fromCharCode(event.which);
                    if (ch === '\r') {
                        ch = '\n';
                    }
                    return ch;
                }

                if (event_name === 'keydown' && event.keyCode >= 112 && event.keyCode <= 123) {
                    var fNumber = event.keyCode - 111;
                    switch (fNumber) {
                        case 1:
                            ch = '\x1bOP';
                            break;
                        case 2:
                            ch = '\x1bOQ';
                            break;
                        case 3:
                            ch = '\x1bOR';
                            break;
                        case 4:
                            ch = '\x1bOS';
                            break;
                        default:
                            ch = '\x1B[' + (fNumber + 10) + '~';
                    }
                    return ch;
                }

                switch (event.keyCode) {
                    case 8:
                        ch = '\b';
                        break;
                    case 9:
                        if (!ign_arrows) {
                            ch = '\t';
                        }
                        break;
                    case 13:case 10:
                        ch = '\r';
                        break;
                    case 38:
                        if (!ign_arrows) {
                            ch = '\x1b[A';
                        }
                        break;
                    case 40:
                        if (!ign_arrows) {
                            ch = '\x1b[B';
                        }
                        break;
                    case 39:
                        if (!ign_arrows) {
                            ch = '\x1b[C';
                        }
                        break;
                    case 37:
                        if (!ign_arrows) {
                            ch = '\x1b[D';
                        }
                        break;
                    case 35:
                        // END
                        ch = '\x1b[F';
                        break;
                    case 36:
                        // HOME
                        ch = '\x1b[H';
                        break;
                    case 34:
                        //PGUP
                        ch = '\x1b[6~';
                        break;
                    case 33:
                        //PGDN
                        ch = '\x1b[5~';
                        break;
                    case 27:
                        ch = '\x1b';
                        break;
                }

                return ch || null;
            };

            $scope.sendInput = function (data) {
                return socket.send('terminal', {
                    action: 'input',
                    id: $scope.id,
                    data: data
                });
            };

            var handler = function handler(key, event, mode) {
                if ($scope.pasteAreaFocused || $scope.disabled) {
                    return;
                }
                if ($scope.extraKeyboardCtrl) {
                    event.ctrlKey = true;
                    $scope.extraKeyboardCtrl = false;
                }
                var ch = $scope.parseKey(event, mode);
                if (!ch) {
                    return false;
                }
                $scope.sendInput(ch);
                return true;
            };

            hotkeys.on($scope, function (k, e) {
                return handler(k, e, 'keypress');
            }, 'keypress:global');

            hotkeys.on($scope, function (k, e) {
                return handler(k, e, 'keydown');
            }, 'keydown:global');

            $scope.fakeKeyEvent = function (code) {
                return handler(null, { keyCode: code }, 'keydown');
            };

            $scope.$watch('pasteData', function () {
                if ($scope.pasteData) {
                    $scope.sendInput($scope.pasteData);
                }
                $scope.pasteData = '';
                element.find('textarea').blur();
            });
        }
    };
});


'use strict';

angular.module('ajenti.terminal').controller('TerminalIndexController', function ($scope, $location, $q, pageTitle, terminals, gettext) {
    pageTitle.set(gettext('Terminals'));

    $scope.refresh = function () {
        return terminals.list().then(function (list) {
            $scope.terminals = list;
        });
    };

    $scope.create = function () {
        return terminals.create({ autoclose: true }).then(function (id) {
            return $location.path('/view/terminal/' + id);
        });
    };

    $scope.runCommand = function () {
        return terminals.create({ command: $scope.command, autoclose: true }).then(function (id) {
            return $location.path('/view/terminal/' + id);
        });
    };

    $scope.kill = function (terminal) {
        return terminals.kill(terminal.id).then(function () {
            return $scope.refresh();
        });
    };

    $scope.refresh();
});


'use strict';

angular.module('ajenti.terminal').controller('TerminalViewController', function ($scope, $routeParams, $interval, terminals, hotkeys, pageTitle, gettext, notify) {
    pageTitle.set('Terminal');

    $scope.id = $routeParams.id;
    $scope.ready = false;
    $scope.copyData = '';
    $scope.copyDialogVisible = false;

    $scope.onReady = function () {
        $scope.ready = true;
        notify.info(gettext('Use exit or Ctrl+D to exit terminal.'));
    };

    hotkeys.on($scope, function (k, e) {
        if (k === 'C' && e.ctrlKey && e.shiftKey) {
            $scope.copyDialogVisible = true;
            return true;
        }
        if (k === 'V' && e.ctrlKey && e.shiftKey) {
            $scope.$broadcast('terminal:paste');
            return true;
        }
        if (k === 'D' && e.ctrlKey) {
            terminals.kill($scope.id);
            return true;
        }
    });

    $scope.check = function () {
        terminals.is_dead($scope.id);
    };

    $scope.redirect_if_dead = $interval($scope.check, 4000, 0);

    $scope.$on('$destroy', function () {
        $interval.cancel($scope.redirect_if_dead);
    });

    $scope.hideCopyDialogVisible = function () {
        return $scope.copyDialogVisible = false;
    };
});


'use strict';

angular.module('ajenti.terminal').controller('ScriptWidgetController', function ($scope, $location, notify, terminals, gettext) {
    $scope.run = function () {
        var _$scope$widget$config = $scope.widget.config,
            script = _$scope$widget$config.script,
            input = _$scope$widget$config.input;

        if ($scope.widget.config.terminal) {
            terminals.create({ command: script, autoclose: true }).then(function (id) {
                return $location.path('/view/terminal/' + id);
            });
        } else {
            notify.info(gettext('Starting the script'), script.substring(0, 100) + '...');
            terminals.script({ script: script, input: input }).then(function (data) {
                if (data.code === 0) {
                    notify.success(gettext('Script has finished'), data.output + data.stderr);
                } else {
                    notify.warning(gettext('Script has failed'), data.stderr + data.output);
                }
            }).catch(function (err) {
                return notify.error(gettext('Could not launch the script'), err.message);
            });
        }
    };
});


'use strict';

angular.module('ajenti.terminal').service('terminals', function ($http, $q, $location, $timeout, notify, gettext) {
    this.script = function (options) {
        return $http.post('/api/terminal/script', options).then(function (response) {
            return response.data;
        });
    };

    this.list = function () {
        return $http.get("/api/terminal/list").then(function (response) {
            var _iteratorNormalCompletion = true;
            var _didIteratorError = false;
            var _iteratorError = undefined;

            try {
                for (var _iterator = response.data[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                    var terminal = _step.value;

                    var cmd = terminal.command.split(' ')[0];
                    var tokens = cmd.split('/');
                    terminal.title = tokens[tokens.length - 1];
                }
            } catch (err) {
                _didIteratorError = true;
                _iteratorError = err;
            } finally {
                try {
                    if (!_iteratorNormalCompletion && _iterator.return) {
                        _iterator.return();
                    }
                } finally {
                    if (_didIteratorError) {
                        throw _iteratorError;
                    }
                }
            }

            return response.data;
        });
    };

    this.kill = function (id) {
        return $http.get('/api/terminal/kill/' + id).then(function (response) {
            var redirect = response.data;
            notify.info(gettext('You will be redirect to the previous page.'));
            return $timeout(function () {
                return $location.path(redirect);
            }, 3000);
        });
    };

    this.is_dead = function (id) {
        var _this = this;

        return $http.get('/api/terminal/is_dead/' + id, { ignoreLoadingBar: true }).then(function (response) {
            if (response.data === true) {
                return _this.kill(id);
            };
        });
    };

    this.create = function (options) {
        if (typeof options === 'undefined' || options === null) {
            options = {};
        }
        return $http.post("/api/terminal/create", options).then(function (response) {
            return response.data;
        });
    };

    this.full = function (id) {
        return $http.get('/api/terminal/full/' + id).then(function (response) {
            return response.data;
        });
    };

    this.navigate = function (id) {
        return $location.path('/view/terminal/' + id);
    };

    return this;
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_terminal/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.filemanager', ['core', 'flow', 'ajenti.filesystem']);


'use strict';

angular.module('core').config(function ($routeProvider) {
    $routeProvider.when('/view/filemanager', {
        templateUrl: '/filemanager:resources/partial/index.html',
        controller: 'FileManagerIndexController'
    });

    $routeProvider.when('/view/filemanager/properties/:path*', {
        templateUrl: '/filemanager:resources/partial/properties.html',
        controller: 'FileManagerPropertiesController'
    });

    return $routeProvider.when('/view/filemanager/:path*', {
        templateUrl: '/filemanager:resources/partial/index.html',
        controller: 'FileManagerIndexController'
    });
});


'use strict';

angular.module('ajenti.filemanager').controller('FileManagerIndexController', function ($scope, $routeParams, $location, $localStorage, $timeout, notify, identity, filesystem, pageTitle, urlPrefix, tasks, messagebox, gettext) {
    pageTitle.set('path', $scope);
    $scope.loading = false;
    $scope.newDirectoryDialogVisible = false;
    $scope.newFileDialogVisible = false;
    $scope.clipboardVisible = false;

    $scope.load = function (path) {
        $scope.loading = true;
        return filesystem.list(path).then(function (data) {
            $scope.path = path;
            $scope.items = data.items;
            $scope.parent = data.parent;
        }, function (data) {
            notify.error(gettext('Could not load directory'), data.message);
        }).finally(function () {
            $scope.loading = false;
        });
    };

    $scope.refresh = function () {
        return $scope.load($scope.path);
    };

    $scope.$on('push:filesystem', function ($event, msg) {
        if (msg === 'refresh') {
            $scope.refresh();
        }
    });

    $scope.navigate = function (path) {
        return $location.path(urlPrefix + '/view/filemanager/' + path);
    };

    $scope.select = function (item) {
        if (item.isDir) {
            $scope.navigate(item.path);
        } else {
            if ($scope.mode === 'open') {
                $scope.onSelect({ item: item });
            }
            if ($scope.mode === 'save') {
                $scope.name = item.name;
            }
        }
    };

    $scope.clearSelection = function () {
        $scope.items.forEach(function (item) {
            return item.selected = false;
        });
    };

    $localStorage.fileManagerClipboard = $localStorage.fileManagerClipboard || [];
    $scope.clipboard = $localStorage.fileManagerClipboard;

    $scope.showClipboard = function () {
        return $scope.clipboardVisible = true;
    };

    $scope.hideClipboard = function () {
        return $scope.clipboardVisible = false;
    };

    $scope.clearClipboard = function () {
        $scope.clipboard.length = 0;
        $scope.hideClipboard();
    };

    $scope.doCut = function () {
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = $scope.items[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var item = _step.value;

                if (item.selected) {
                    $scope.clipboard.push({
                        mode: 'move',
                        item: item
                    });
                }
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        $scope.clearSelection();
    };

    $scope.doCopy = function () {
        var _iteratorNormalCompletion2 = true;
        var _didIteratorError2 = false;
        var _iteratorError2 = undefined;

        try {
            for (var _iterator2 = $scope.items[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
                var item = _step2.value;

                if (item.selected) {
                    $scope.clipboard.push({
                        mode: 'copy',
                        item: item
                    });
                }
            }
        } catch (err) {
            _didIteratorError2 = true;
            _iteratorError2 = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion2 && _iterator2.return) {
                    _iterator2.return();
                }
            } finally {
                if (_didIteratorError2) {
                    throw _iteratorError2;
                }
            }
        }

        $scope.clearSelection();
    };

    $scope.doDelete = function () {
        return messagebox.show({
            text: gettext('Delete selected items?'),
            positive: gettext('Delete'),
            negative: gettext('Cancel')
        }).then(function () {
            var items = $scope.items.filter(function (item) {
                return item.selected;
            });
            tasks.start('aj.plugins.filesystem.tasks.Delete', [], { items: items });
            $scope.clearSelection();
        });
    };

    $scope.doPaste = function () {
        var items = angular.copy($scope.clipboard);
        tasks.start('aj.plugins.filesystem.tasks.Transfer', [], { destination: $scope.path, items: items }).then(function () {
            $scope.clearClipboard();
        });
    };

    // new file dialog

    $scope.showNewFileDialog = function () {
        $scope.newFileName = '';
        $scope.newFileDialogVisible = true;
    };

    $scope.doCreateFile = function () {
        if (!$scope.newFileName) {
            return;
        }

        return filesystem.createFile($scope.path + '/' + $scope.newFileName).then(function () {
            $scope.refresh();
            $scope.newFileDialogVisible = false;
        }, function (err) {
            notify.error(gettext('Could not create file'), err.data.message);
        });
    };

    // new directory dialog

    $scope.showNewDirectoryDialog = function () {
        $scope.newDirectoryName = '';
        $scope.newDirectoryDialogVisible = true;
    };

    $scope.doCreateDirectory = function () {
        if (!$scope.newDirectoryName) {
            return;
        }

        return filesystem.createDirectory($scope.path + '/' + $scope.newDirectoryName).then(function () {
            $scope.refresh();
            $scope.newDirectoryDialogVisible = false;
        }, function (err) {
            notify.error(gettext('Could not create directory'), err.data.message);
        });
    };

    $scope.onUploadBegin = async function ($flow) {
        msg = messagebox.show({ progress: true });
        filesystem.startFlowUpload($flow, $scope.path).then(function () {
            notify.success(gettext('Uploaded'));
            $scope.refresh();
            msg.close();
        }, null, function (progress) {
            console.log(progress);
            msg.messagebox.title = 'Uploading: ' + Math.floor(100 * progress) + '%';
        });
    };

    // ---

    identity.promise.then(function () {
        var root = identity.profile.fs_root || '/';
        var path = $routeParams.path || '/';
        if (path.indexOf(root) !== 0) {
            path = root;
        }

        if ($routeParams.path) {
            $scope.load(path);
        } else {
            $scope.navigate(root);
        }
    });
});


'use strict';

angular.module('ajenti.filemanager').controller('FileManagerPropertiesController', function ($scope, $routeParams, $location, notify, filesystem, pageTitle, urlPrefix, gettext) {
    pageTitle.set('path', $scope);

    var modeBits = ['ax', 'aw', 'ar', 'gx', 'gw', 'gr', 'ux', 'uw', 'ur', 'sticky', 'setuid', 'setgid'];
    $scope.permissionsDialogVisible = false;

    $scope.path = $routeParams.path;
    $scope.refresh = function () {
        return filesystem.stat($scope.path).then(function (info) {
            $scope.info = info;
            $scope.mode = {};
            for (var i = 0; i < modeBits.length; i++) {
                $scope.mode[modeBits[i]] = !!($scope.info.mode & Math.pow(2, i));
            }
        }, function (err) {
            notify.error(gettext('Could not read file information'), err);
        });
    };

    $scope.hidePermissionsDialog = function () {
        return $scope.permissionsDialogVisible = false;
    };

    $scope.applyPermissions = function () {
        $scope.hidePermissionsDialog();

        var mode = 0;
        for (var i = 0; i < modeBits.length; i++) {
            mode += $scope.mode[modeBits[i]] ? Math.pow(2, i) : 0;
        }

        return filesystem.chmod($scope.path, mode).then(function () {
            notify.info(gettext('File mode saved'));
            $scope.refresh();
        });
    };

    $scope.refresh();
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_filemanager/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.packages', ['core']);


'use strict';

angular.module('core').config(function ($routeProvider) {
    $routeProvider.when('/view/packages/:managerId', {
        templateUrl: '/packages:resources/partial/index.html',
        controller: 'PackagesIndexController'
    });
});


'use strict';

angular.module('ajenti.packages').controller('PackagesIndexController', function ($scope, $routeParams, $location, notify, pageTitle, urlPrefix, packages, terminals, gettext) {
    pageTitle.set(gettext('Packages'));

    $scope.managerId = $routeParams.managerId;
    $scope.searchQuery = '';
    $scope.results = [];
    $scope.selection = [];
    $scope.selectionVisible = false;

    $scope.$watch('searchQuery', function () {
        if ($scope.searchQuery.length < 3) {
            return;
        }
        $scope.results = null;
        packages.list($scope.managerId, $scope.searchQuery).then(function (data) {
            $scope.results = data;
        }, function (err) {
            notify.error(gettext('Could not find packages'), err.message);
            $scope.results = [];
        });
    });

    $scope.updateLists = function () {
        return packages.updateLists($scope.managerId).then(function (data) {
            notify.info(gettext('Package list update started'));
        }, function (err) {
            notify.error(gettext('Package list update failed'), err.message);
        });
    };

    $scope.mark = function (pkg, op) {
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = $scope.selection[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var sel = _step.value;

                if (sel.package.id === pkg.id) {
                    $scope.selection.remove(sel);
                }
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        $scope.selection.push({
            package: pkg,
            operation: op
        });
    };

    $scope.markForInstallation = function (pkg) {
        return $scope.mark(pkg, 'install');
    };

    $scope.markForUpgrade = function (pkg) {
        return $scope.mark(pkg, 'upgrade');
    };

    $scope.markForRemoval = function (pkg) {
        return $scope.mark(pkg, 'remove');
    };

    $scope.showSelection = function () {
        return $scope.selectionVisible = true;
    };

    $scope.hideSelection = function () {
        return $scope.selectionVisible = false;
    };

    $scope.doApply = function () {
        return packages.applySelection($scope.managerId, $scope.selection).then(function (data) {
            $scope.selection = [];
            var cmd = data.terminalCommand;
            terminals.create({ command: cmd, autoclose: true, redirect: '/view/packages/' + $scope.managerId }).then(function (id) {
                $location.path(urlPrefix + '/view/terminal/' + id);
            });
        }).catch(function () {
            notify.error(gettext('Could not apply changes'));
        });
    };
});


'use strict';

angular.module('ajenti.packages').service('packages', function ($http, $q, tasks) {
    this.getManagers = function () {
        return $http.get("/api/packages/managers").then(function (response) {
            return response.data;
        });
    };

    this.list = function (managerId, query) {
        return $http.get('/api/packages/list/' + managerId + '?query=' + query).then(function (response) {
            return response.data;
        });
    };

    this.get = function (managerId, packageId) {
        return $http.get('/api/packages/get/' + managerId + '/' + packageId).then(function (response) {
            return response.data;
        }).error(function (err) {
            return q.reject(err);
        });
    };

    this.updateLists = function (managerId) {
        return tasks.start('aj.plugins.packages.tasks.UpdateLists', [], { manager_id: managerId });
    };

    this.applySelection = function (managerId, selection) {
        return $http.post('/api/packages/apply/' + managerId, selection).then(function (response) {
            return response.data;
        });
    };

    return this;
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_packages/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.notepad', ['core', 'ajenti.filesystem', 'ajenti.ace']);


'use strict';

angular.module('core').config(function ($routeProvider) {
    $routeProvider.when('/view/notepad', {
        templateUrl: '/notepad:resources/partial/index.html',
        controller: 'NotepadIndexController'
    });

    $routeProvider.when('/view/notepad/:path*', {
        templateUrl: '/notepad:resources/partial/index.html',
        controller: 'NotepadIndexController'
    });
});


'use strict';

angular.module('ajenti.notepad').controller('NotepadIndexController', function ($scope, $routeParams, $location, notify, filesystem, pageTitle, hotkeys, config, gettext) {
    pageTitle.set('');

    $scope.newFile = function () {
        if ($scope.content) {
            if (!confirm(gettext('Current file will be closed. Continue?'))) {
                return;
            }
        }
        $scope.path = null;
        $scope.content = '';
    };

    $scope.showOpenDialog = function () {
        return $scope.openDialogVisible = true;
    };

    $scope.open = function (path) {
        var url = '/view/notepad/' + path;
        if ($location.path() !== url) {
            $location.path(url);
            return;
        }

        $scope.openDialogVisible = false;
        $scope.path = path;
        pageTitle.set(path);

        return filesystem.read($scope.path).then(function (content) {
            $scope.content = content;
            $scope.$broadcast('ace:reload', $scope.path);
        }, function (err) {
            notify.error(gettext('Could not open the file'), err.message);
        });
    };

    $scope.save = function () {
        return $scope.saveAs($scope.path);
    };

    $scope.saveAs = function (path) {
        $scope.saveDialogVisible = false;
        var mustReload = path !== $scope.path;
        $scope.path = path;
        return filesystem.write($scope.path, $scope.content).then(function () {
            notify.success('Saved', $scope.path);
            if (mustReload) {
                return $scope.open($scope.path);
            } else {
                $scope.$broadcast('ace:reload', $scope.path);
            }
        }, function (err) {
            notify.error(gettext('Could not save the file'), err.message);
        });
    };

    $scope.showSaveDialog = function () {
        $scope.saveDialogVisible = true;
        if ($scope.path) {
            var t = $scope.path.split('/');
            $scope.saveAsName = t[t.length - 1];
        } else {
            $scope.saveAsName = 'new.txt';
        }
    };

    config.getUserConfig().then(function (userConfig) {
        $scope.userConfig = userConfig;
        $scope.userConfig.notepad = $scope.userConfig.notepad || {};
        $scope.userConfig.notepad.bookmarks = $scope.userConfig.notepad.bookmarks || [];
        $scope.bookmarks = $scope.userConfig.notepad.bookmarks;
    });

    $scope.toggleBookmark = function () {
        $scope.bookmarks.toggleItem($scope.path);
        config.setUserConfig($scope.userConfig);
    };

    if ($routeParams.path) {
        $scope.open($routeParams.path);
    } else {
        $scope.newFile();
    }

    hotkeys.on($scope, function (key, event) {
        if (key === 'O' && event.ctrlKey) {
            $scope.showOpenDialog();
            return true;
        }
        if (key === 'S' && event.ctrlKey) {
            if ($scope.path && !event.shiftKey) {
                $scope.save();
            } else {
                $scope.showSaveDialog();
            }
            return true;
        }
        if (key === 'N' && event.ctrlKey) {
            $scope.newFile();
            return true;
        }
        return false;
    });
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_notepad/resources/build/all.js');
                console.error('  ', err);
            }
        
            try {
                'use strict';

angular.module('ajenti.settings', ['core', 'ajenti.filesystem', 'ajenti.passwd']);

angular.module('ajenti.settings').run(function (customization) {
    return customization.plugins.settings = {};
});


'use strict';

angular.module('core').config(function ($routeProvider) {
    return $routeProvider.when('/view/settings', {
        templateUrl: '/settings:resources/partial/index.html',
        controller: 'SettingsIndexController'
    });
});


'use strict';

angular.module('ajenti.settings').controller('SettingsIndexController', function ($scope, $http, $sce, notify, pageTitle, identity, messagebox, passwd, config, core, locale, gettext) {
    pageTitle.set(gettext('Settings'));

    $scope.config = config;
    $scope.oldCertificate = config.data.ssl.certificate;

    $scope.availableColors = ['default', 'bluegrey', 'red', 'deeporange', 'orange', 'green', 'teal', 'blue', 'purple'];

    $scope.newClientCertificate = {
        c: 'NA',
        st: 'NA',
        o: '',
        cn: ''
    };

    identity.promise.then(function () {
        $scope.newClientCertificate.o = identity.machine.name;
        passwd.list().then(function (data) {
            $scope.availableUsers = data;
            $scope.$watch('newClientCertificate.user', function () {
                return $scope.newClientCertificate.cn = identity.user + '@' + identity.machine.hostname;
            });
            $scope.newClientCertificate.user = 'root';
        });
        $http.get('/api/core/languages').then(function (rq) {
            return $scope.languages = rq.data;
        });
    });

    config.load().then(function () {
        return config.getAuthenticationProviders(config);
    }, function () {
        return notify.error(gettext('Could not load config'));
    }).then(function (p) {
        return $scope.authenticationProviders = p;
    }).catch(function () {
        return notify.error(gettext('Could not load authentication provider list'));
    });

    $scope.$watch('config.data.color', function () {
        if (config.data) {
            identity.color = config.data.color;
        }
    });

    $scope.$watch('config.data.language', function () {
        if (config.data) {
            locale.setLanguage(config.data.language);
        }
    });

    $scope.save = function () {
        $scope.certificate = config.data.ssl.certificate;
        if ($scope.certificate != $scope.oldCertificate) {
            return $http.post('/api/settings/test-certificate/', { 'certificate': $scope.certificate }).then(function (data) {
                config.save().then(function (dt) {
                    return notify.success(gettext('Saved'));
                });
            }).catch(function (err) {
                notify.error(gettext('SSL Error')), err.message;
            });
        } else {
            config.save().then(function (data) {
                return notify.success(gettext('Saved'));
            }).catch(function () {
                return notify.error(gettext('Could not save config'));
            });
        }
    };

    $scope.createNewServerCertificate = function () {
        return messagebox.show({
            title: gettext('Self-signed certificate'),
            text: gettext('Generating a new certificate will void all existing client authentication certificates!'),
            positive: gettext('Generate'),
            negative: gettext('Cancel')
        }).then(function () {
            config.data.ssl.client_auth.force = false;
            notify.info(gettext('Generating certificate'), gettext('Please wait'));
            return $http.get('/api/settings/generate-server-certificate').success(function (data) {
                notify.success(gettext('Certificate successfully generated'));
                config.data.ssl.enable = true;
                config.data.ssl.certificate = data.path;
                config.data.ssl.client_auth.certificates = [];
                $scope.save();
            }).error(function (err) {
                return notify.error(gettext('Certificate generation failed'), err.message);
            });
        });
    };

    $scope.generateClientCertificate = function () {
        $scope.newClientCertificate.generating = true;
        return $http.post('/api/settings/generate-client-certificate', $scope.newClientCertificate).success(function (data) {
            $scope.newClientCertificate.generating = false;
            $scope.newClientCertificate.generated = true;
            $scope.newClientCertificate.url = $sce.trustAsUrl('data:application/x-pkcs12;base64,' + data.b64certificate);
            config.data.ssl.client_auth.certificates.push({
                user: $scope.newClientCertificate.user,
                digest: data.digest,
                name: data.name,
                serial: data.serial
            });
        }).error(function (err) {
            $scope.newClientCertificate.generating = false;
            $scope.newClientCertificateDialogVisible = false;
            notify.error(gettext('Certificate generation failed'), err.message);
        });
    };

    $scope.addEmail = function (email, username) {
        config.data.auth.emails[email] = username;
        $scope.newEmailDialogVisible = false;
    };

    $scope.removeEmail = function (email) {
        return delete config.data.auth.emails[email];
    };

    $scope.restart = function () {
        return core.restart();
    };
});



            } catch (err) {
                console.warn('Plugin load error:');
                console.warn(' * /usr/local/lib/python3.6/dist-packages/ajenti_plugin_settings/resources/build/all.js');
                console.error('  ', err);
            }
        