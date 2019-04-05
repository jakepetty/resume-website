/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/canvas.js":
/*!********************************!*\
  !*** ./resources/js/canvas.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var canvas = document.querySelector("#particles");

if (canvas) {
  var Circle = function Circle(x, y, dx, dy, radius) {
    this.x = x;
    this.y = y;
    this.dx = Math.random() * dx * 8;
    this.dy = Math.random() * dy * 8;
    this.radius = radius; // var r = Math.random() * 255;
    // var g = Math.random() * 255;
    // var b = Math.random() * 255;

    var r = 37;
    var g = 45;
    var b = 66;

    this.draw = function () {
      c.beginPath();
      c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
      c.fillStyle = "rgba(" + r + "," + g + "," + b + ",1)";
      c.strokeStyle = "rgba(" + r + "," + g + "," + b + ",.5)";
      c.lineWidth = 2.5;
      c.stroke();
      c.fill();
    };

    this.update = function () {
      if (this.x + this.radius > parentWidth || this.x - this.radius < 0) {
        this.dx = -this.dx;
      }

      if (this.y + this.radius > parentHeight || this.y - this.radius < 0) {
        this.dy = -this.dy;
      }

      this.x += this.dx;
      this.y += this.dy;
      this.draw();
    };
  };

  var animate = function animate() {
    requestAnimationFrame(animate);
    c.clearRect(0, 0, parentWidth, parentHeight);

    for (var i = 0; i < max_circles; i++) {
      circleArray[i].update();
    }
  };

  var parent = $("#about");
  var parentWidth = parent.innerWidth();
  var parentHeight = parent.innerHeight();
  canvas.width = parentWidth;
  canvas.height = parentHeight;
  var c = canvas.getContext('2d');
  var max_circles = 10;
  var circleArray = [];

  for (var i = 0; i < max_circles; i++) {
    var radius = Math.random() * 5;
    var x = Math.random() * (parentWidth - radius * 2) + radius;
    var y = Math.random() * (parentHeight - radius * 2) + radius;
    var dx = Math.random() - 0.5;
    var dy = Math.random() - 0.5;
    circleArray.push(new Circle(x, y, dx, dy, radius));
  }

  animate();
}

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/canvas.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! H:\Websites\vexcon.net\resume\resources\js\canvas.js */"./resources/js/canvas.js");


/***/ })

/******/ });