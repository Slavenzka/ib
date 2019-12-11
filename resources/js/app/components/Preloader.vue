<template>
  <div class="preloader" :class="{'is-loading': loading}">
    <div class="preloader__squire"></div>
    <div class="preloader__squire"></div>
    <div class="preloader__squire"></div>
    <span class="preloader__text"><slot /></span>
  </div>
</template>

<script>
  export default {
    props: {
      loading: Boolean
    }
  }
</script>

<style lang="scss">
  @import "../../../sass/app/config/variables";

  .preloader {
    position: relative;

    &__squire {
      width: 0.625rem;
      height: 0.625rem;
      background-color: $color-bg;
      position: absolute;
      top: 50%;
      left: 50%;
      margin: -0.3125rem;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.35s;
    }

    &__text {
      opacity: 1;
      transition: opacity 0.35s;
    }

    &.is-loading {
      .preloader__squire:nth-child(1) {
        opacity: 1;
        animation: linear 1.5s bounced infinite;
      }

      .preloader__squire:nth-child(2) {
        opacity: 1;
        animation: linear 1.5s bounced 0.25s infinite;
      }

      .preloader__squire:nth-child(3) {
        opacity: 1;
        animation: linear 1.5s bounced 0.5s infinite;
      }

      .preloader__text {
        opacity: 0;
      }
    }
  }

  @keyframes bounced {
    0% {
      transform: scale(0.65) translateX(-2.5em);
    }
    25% {
      transform: scale(1) translateX(0);
    }
    50% {
      transform: scale(0.65) translateX(2.5em);
    }
    75% {
      transform: scale(1) translateX(0);
    }
    100% {
      transform: scale(0.65) translateX(-2.5em);
    }
  }
</style>
