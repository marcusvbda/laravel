<template>
    <div>
        <div class="card card-small mb-4">  
            <div class="card-header border-bottom">
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" :placeholder="filter_placeholder" :value="filter" name="filter">
                                <div class="input-group-append">
                                    <button class="btn btn-white" type="button">
                                        <i class="fa fa-search"></i>
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body p-0 pb-3 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <td class="border-0" v-for="col in collumns">
                                <a v-show="col[2]" @click="orderbyCollumn('order_name',col[1])" style="color:#5A6169;display: inline-block;width: 100%;cursor:pointer;" title="ordernar">
                                    <i v-show="((order_name==col[1])&&(order_type=='ASC'))" class="fas fa-caret-up"></i>
                                    <i v-show="((order_name==col[1])&&(order_type=='DESC'))" class="fas fa-caret-down"></i>
                                    <span>{{col[0]}}</span>
                                </a>
                                <span v-show="!col[2]" >{{col[0]}}</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <slot name="tbody"></slot>
                    </tbody>
                </table>
            </div>
        </div>
        <slot name="pagination"></slot>
    </div>
</template>

<script>
export default 
{
    props: ['collumns','order_name','order_type','filter','filter_placeholder'],
    data: function () {
      return {
        _order_type: this.order_type,
        _order_name: this.order_name,
        _collumns: this.collumns,
      }
    },
    methods:
    {
        addParameter : function(key, value, kvp)
        {
            if (kvp == '') 
            {
                document.location.search = '?' + key + '=' + value;
            }
            else 
            {
                var i = kvp.length; var x; while (i--) 
                {
                    x = kvp[i].split('=');
                    if (x[0] == key) 
                    {
                        x[1] = value;
                        kvp[i] = x.join('=');
                        break;
                    }
                }
                if (i < 0) { kvp[kvp.length] = [key, value].join('='); }
                return kvp;
            }
        },
        orderbyCollumn : function(key, value)
        {
            var kvp = document.location.search.substr(1).split('&');
            var url = this.addParameter(key, value, kvp);
            if(this.order_name==value)
            {
                if(this.order_type=="ASC")
                {
                    url = this.addParameter("order_type", "DESC", url);
                }
                else
                {
                    url = this.addParameter("order_type", "ASC", url);
                }
            }
            return document.location.search = url.join('&');
        }

    }
}
</script>