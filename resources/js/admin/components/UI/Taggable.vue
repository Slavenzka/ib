<template>
  <div>
    <tags-input v-model="tag" :tags="tags" :autocomplete-items="filteredItems" @tags-changed="handler"/>
    <input type="hidden" :name="name" :value="ids">
  </div>
</template>

<script>
  import TagsInput from '@johmun/vue-tags-input';

  export default {
    components: {
      TagsInput
    },

    props: {
      tagged: {
        type: Array,
        default() {
          return [];
        }
      },
      name: {
        type: String,
        default: 'tags'
      }
    },

    data() {
      return {
        tag: '',
        tags: this.tagged,
        available: []
      }
    },

    methods: {
      async init() {
        await axios.get('/admin/crm/tags')
          .then(({data}) => this.available = data);
      },

      async handler(value) {
        if (value.length && value.length > this.tags.length) {
          const el = value.pop();

          if (el.id) {
            this.tags.push(el);
          } else {
            await axios.post('/admin/crm/tags', {name: el.text})
              .then(({data}) => this.tags.push(data));
          }
        } else {
          this.tags = value;
        }
      }
    },

    computed: {
      ids() {
        return this.tags.filter(t => t.id).map(t => t.id).join(',');
      },

      filteredItems() {
        return this.available.filter(i => {
          return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
        });
      },
    },

    created() {
      this.init();
    }
  }
</script>

<style lang="scss">
  @import "../../../../sass/admin/config/variables";

  .vue-tags-input {
    max-width: initial !important;

    .ti-new-tag-input {
      background: transparent;
      color: #b7c4c9;
    }

    .ti-input {
      padding: 8px 10px;
      border: 1px solid #ced4da;
      transition: border-bottom 200ms ease;
      border-radius: 0.25rem;
    }

    .ti-autocomplete {
      border: 1px solid $yellow;
      border-radius: 0.25rem;
      margin-top: 2px;
    }

    .ti-item.ti-selected-item {
      background: $yellow;
      color: #283944;
    }

    .ti-tag {
      position: relative;
      background: $yellow;
      color: #283944;
    }

    &.ti-focus .ti-input {
      border: 1px solid $yellow;
    }
  }

</style>
