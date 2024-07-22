<template>
  <div>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="48"
        height="48"
        viewBox="0 0 48 48"
        fill="currentColor"
    >
      <defs>
        <clipPath id="ring">
          <path
              d="M 24, 48 A 23.9, 24, 0, 1, 1, 47.7, 25 L 45.7, 25 A 22, 22, 0, 1, 0, 24, 46 z"
          ></path>
        </clipPath>
        <filter id="blur">
          <feGaussianBlur in="SourceGraphic" stdDeviation="3"></feGaussianBlur>
        </filter>
        <path
            id="p"
            d="M 24, 60 A 36, 36, 0, 0, 1, 31.4856, 59.2128 L 24, 24 A 0, 0, 0, 0, 0, 24, 24 z"
            fill="currentColor"
        ></path>
      </defs>
      <g clip-path="url(#ring)">
        <g filter="url(#blur)" transform="rotate(-6 24 24)">
          <use
              xlink:href="#p"
              fill-opacity="0"
              transform="rotate(  0 24 24)"
          ></use>
          <!-- Остальные use элементы -->

          <use
              xlink:href="#p"
              fill-opacity="0"
              transform="rotate(  0 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0"
              transform="rotate( 12 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0"
              transform="rotate( 24 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0"
              transform="rotate( 36 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.01"
              transform="rotate( 48 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.06"
              transform="rotate( 60 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.09"
              transform="rotate( 72 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.17"
              transform="rotate( 84 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.2380"
              transform="rotate( 96 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.2856"
              transform="rotate(108 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.3332"
              transform="rotate(120 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.3808"
              transform="rotate(132 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.4284"
              transform="rotate(144 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.4760"
              transform="rotate(156 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.5236"
              transform="rotate(168 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.5712"
              transform="rotate(180 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.6188"
              transform="rotate(192 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.6664"
              transform="rotate(204 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.7140"
              transform="rotate(216 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.7616"
              transform="rotate(228 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.8092"
              transform="rotate(240 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.8568"
              transform="rotate(252 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.9044"
              transform="rotate(264 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="0.9520"
              transform="rotate(276 24 24)"
          ></use>
          <use
              xlink:href="#p"
              fill-opacity="1"
              transform="rotate(288 24 24)"
          ></use>
        </g>
      </g>
    </svg>
  </div>
</template>
<script>
export default {
  name: 'loaderVue'
};
</script>
<style>
@keyframes rotate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.loading-wrapper svg path {
  fill: #1e79c7;
}

.loading-wrapper svg {
  animation: rotate 2s linear infinite;
}
</style>
