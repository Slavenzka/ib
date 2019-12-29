<template>
  <div class="collapsed" :class="{'is-open': !collapsed}" v-if="slotPassed">
    <div class="collapsed__entry" ref="entry">
      <slot/>
    </div>

    <div class="text-center" v-if="button">
      <button class="btn btn-link btn-sm" @click.prevent="collapsed = !collapsed">
        {{collapsed ? 'Развернуть' : 'Свернуть'}}
      </button>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        collapsed: true,
        button: false
      }
    },

    mounted() {
      if (this.slotPassed) {
        this.button = this.$refs.entry.clientHeight === 90;
      }
    },

    computed: {
      slotPassed() {
        return Object.keys(this.$slots).length;
      }
    }
  }
</script>

<style lang="scss">
  @import "../../../../sass/admin/config/functions";

  .collapsed {
    position: relative;
    margin-bottom: rem-calc(15);
    z-index: 10;

    &:before {
      position: absolute;
      left: -0.5rem;
      right: -0.5rem;
      top: -0.25rem;
      bottom: 0.55rem;
      content: '';
      border: 1px solid transparent;
      z-index: -1;
      border-radius: 0.25rem;
      transition: 0.35s;
    }

    &:hover {
      &::before {
        border-color: darken(#fff, 5%)
      }
    }

    &__entry {
      max-height: 90px;
      overflow: hidden;
      transition: max-height 0.35s;
      position: relative;

      &::after {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 2rem;
        background: linear-gradient(to top, rgba(#fff, 1), rgba(#fff, 0));
        content: '';
        z-index: 5;
      }
    }

    &.is-open {
      .collapsed__entry {
        max-height: initial;

        &::after {
          display: none;
        }
      }
    }

    .btn {
      font-size: rem-calc(11);
      padding: 0 0.5rem;
      background-color: #fff;
    }
  }
</style>
