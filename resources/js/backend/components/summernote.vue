<script>
export default {
  render: function (createElement) {
    return createElement('div')
  },
  mounted: function () {
    var self = this
    var initOptions = {
      placeholder: self.placeholder,
      popover:{},
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ],
      height: self.height,
      minHeight: self.minHeight,
      maxHeight: self.maxHeight,
      focus: self.focus,
      callbacks: {
        onInit: function () {
          self.$emit('onInit')
        },
        onEnter: function () {
          self.$emit('onEnter')
        },
        onFocus: function () {
          self.$emit('onFocus')
        },
        onBlur: function () {
          self.$emit('onBlur')
        },
        onKeyup: function (e) {
          self.$emit('onKeyup', e)
        },
        onKeydown: function (e) {
          self.$emit('onKeydown', e)
        },
        onPaste: function (e) {
          self.$emit('onPaste', e)
        },
        onImageUpload: function (files) {
          self.$emit('onImageUpload', files)
        },
        onChange: function (contents) {
          self.$emit('onChange', contents)
        }
      }
    }
    var params = Object.assign({}, initOptions)
    $(this.$el).summernote(params)
  },
  beforeDestroy: function () {
    $(this.$el).summernote('destroy')
  },
  props: {
    placeholder: {
      type: String,
      default: ''
    },
    height: {
      type: Number,
      default: 500
    },
    minHeight: {
      type: Number,
      default: 200
    },
    maxHeight: {
      type: Number,
      default: 700
    },
    focus: {
      type: Boolean,
      default: true
    }
  },
  methods: {
    /**
    * run summernote API
    * @param {String} code
    * @param {String | Number} value
    * @returns {*|jQuery}
    */
    run: function (code, value) {
      if (typeof value === undefined) {
        return $(this.$el).summernote(code)
      } else {
        return $(this.$el).summernote(code, value)
      }
    }
  }
}
</script>
