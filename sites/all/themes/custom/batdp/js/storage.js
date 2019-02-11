
function _typeof(obj, type){
  return (typeof obj == type);
}

function isDefined(obj){
  if(_typeof(obj, "undefined")){
    return false;
  }

  return true;
}

function isNull(val) {
  return (val == null);
}

function isTrue(val){
	if(isBoolean(val) && val === true){
		return true;
	}

	if(isString(val) && val == 'true'){
		return true;
	}

	return false;
}

function isFalse(val){
	if(isBoolean(val) && val === false){
		return true;
	}

	if(isString(val) && val == 'false'){
		return true;
	}

	return false;
}

function isString(elm, empty){

  var val = true;

  if(!isDefined(elm)){
    return false;
  }

  if(empty){
    val = isNotEmpty(elm);
  }

  return (_typeof(elm,'string') && val);
}

function isBoolean(elm){
  if(!isDefined(elm)){
    return false;
  }

  return _typeof(elm,'boolean');
}

function isNumber(elm){
  if(!isDefined(elm)){
    return false;
  }

  return /^[\d]+$/.test(elm);
}

function isInteger(elm){
  if(!isDefined(elm)){
    return false;
  }

  return _typeof(elm,'number');
}

function inArray(arr, key){
  return (arr.indexOf(key) != -1);
}

function isObject(elm){
  return _typeof(elm,'object');
}

function isJson(elm){
  if(!isDefined(elm) || isNull(elm)){
    return false;
  }

  return isObject(elm);
}

function mergeData(obj1, obj2){

  if(!isJson(obj1) || !isJson(obj2)) return {};

  for(var i in obj2){
    obj1[i] = obj2[i];
  }

  return obj1;
}


/**
*	$rdks.storage
*/
rdksStorage = (function(){

  var keys = [],
    values = [],
    unique = [],
    lock = [];

  function isSecure(name){
    return inArray(lock, name);
  }

  function checkName(str){
    return /^[a-zA-Z0-9_]+$/.test(str);
  }

  function isset(name){
    return inArray(keys, name);
  }

  function set(name, value){

    if(isSecure(name)) return;

    if(!checkName(name)) return;

    if(!inArray(unique, name)){

      if(!isset(name)){
        keys.push(name);
      }

      values[name] = (isInteger(value)) ? parseInt(value) : value;
    }
  }

  return {
    secure: function(name, value){

      set(name, value);

      if(!isSecure(name)){
        lock.push(name);
      }

    },
    set: function(name, value){
      set(name, value);
    },
    setOnce: function(name, value){

      set(name, value);

      if(!inArray(unique, name)){
        unique.push(name);
      }
    },
    get: function(name){
      if(isset(name)){
        return values[name];
      }

      return null;
    },
    unset: function(name){

      if(!isset(name) || isSecure(name)) return;

      delete values[name];

      var index_1 = keys.indexOf(name),
        index_2 = unique.indexOf(name);

      if (index_1 > -1) {
          keys.splice(index_1, 1);
      }

      if (index_2 > -1) {
          unique.splice(index_2, 1);
      }

    },
    index: function(){
      return keys;
    },
    data: function(){
      return values;
    },
    isset: function(name){
      return isset(name);
    },
    flush: function(){

      var _values = [];
      keys = [];
      unique = [];

      $.each(lock, function(k,v){
        keys.push(v);
        var content = rdksStorage.get(v);
        _values[v] = content;
      });

      values = _values;

    }
  };

})();

/**
*	$rdks.pipe
*/
rdksPipe = function(name){

    function _saveData(content, sufix){
      rdksStorage.set(name+sufix, content);

      if(rdksStorage.get(name+'_local')){
        window.localStorage.setItem(name, JSON.stringify(content));
      }
    }

    function _set(content){
      _saveData(content, '');
    }

    function _setData(content){
      _saveData(content, '_data');
    }

  function _isset(value){
    var stored = rdksStorage.get(name);
          return inArray(stored, value);
  }

  function _unset(value){

          if(_isset(value)){

            var stored = rdksStorage.get(name),
                index = stored.indexOf(value);

              stored.splice(index, 1);
              _set(stored);
              return true;
          }

          return false;
  }

    function _getData(){
      return rdksStorage.get(name+'_data');
    }

    function _isLocal(){
      return rdksStorage.get(name+'_local');
    }

    function _flush(){
      if(_isLocal()){
        window.localStorage.removeItem(name);
      }
    }

    function _loadData(tube){
      if(rdksStorage.get(name+'_local')){
        var storage = window.localStorage.getItem(name),
          content = JSON.parse(storage);

        if(!isNull(storage)){
          if(isTrue(tube)){
            _setData(content);
          } else {
            _set(content);
          }
        }
      }
    }

    return {
        init: function(remain, tube){
            rdksStorage.set(name, []);
            rdksStorage.set(name+'_data', {});
            rdksStorage.set(name+'_local', isTrue(remain));
            _loadData(tube);
        },
        isset: function(value){
      return _isset(value);
        },
        get: function(){
            return rdksStorage.get(name);
        },
        set: function(value, duplicated, prepend){
            var stored = rdksStorage.get(name),
              exists = true;

            if(!this.isset(value) || isTrue(duplicated)){

              if(isTrue(prepend)){
                stored.unshift(value);
              } else {
                stored.push(value);
              }

                _set(stored);
                exists = false;
            }

            return exists;

        },
        prepend: function(value, duplicated){
          return this.set(value, duplicated, true);
        },
        unset: function(value){
            while(_unset(value)){

            }
        },
      count: function(){
        return this.get().length;
      },
      flush: function(){
        _flush();
        this.init(_isLocal());
      },
        /**
        *	$rdks.pipe('clients')
        */
        tube: function(id){

          var parent = this;

          if(!isDefined(id)){

            return {
              /**
              *	$rdks.pipe('clients').tube().init(true);
              */
              init: function(remain){
                parent.init(remain, true);
              },
              /**
              *	$rdks.pipe('clients').tube().data();
              */
              data: function(){
                return _getData();
              },
              /**
              *	$rdks.pipe('clients').tube().flush();
              */
              flush: function(){
                _flush();
                parent.init(_isLocal());
              },
              /**
              *	$rdks.pipe('clients').tube().count();
              */
              count: function(){
                return parent.count();
              }
            }

          }

          return {
            /**
            *	$rdks.pipe('clients').tube('address').get();
            */
            get: function(){
              var data = _getData();

              if(!isDefined(data[id])){
                return null;
              }

              return data[id];
            },
            /**
            *	$rdks.pipe('clients').tube('address').isset();
            */
            isset: function(){
              return (!isNull(this.get()));
            },
            /**
            *	$rdks.pipe('clients').tube('address').set({"num":3438,"street":"Soth #442"});
            */
            set: function(obj){
              var content,
                n = id,
                value = n.toString();

              rdksPipe(name).set(value);
              content = _getData();

              content[id] = obj;
              _setData(content);
            },
            /**
            *	$rdks.pipe('clients').tube('address').unset('num');
            */
            unset: function(node){
              var data = this.get();

          if(!isNull(data)){
                delete data[node];
                this.set(data);
              }

            },
            /**
            *	// Update current node value
            *	$rdks.pipe('clients').tube('address').update({"street":"Island #9277"});
            *
            *	// Add new node
            *	$rdks.pipe('clients').tube('address').update({"phone":"999889277"});
            */
            update: function(obj){
              var data = this.get(),
                content;

              if(!isNull(data) && isDefined(obj)){
                content = isJson(data) ? mergeData(data, obj) : obj;
                this.set(content);
              }
            },
            /**
            *	$rdks.pipe('clients').tube('address').remove();
            */
            remove: function(){
              var content = _getData(),
                n = id,
                idx = n.toString();

              if(!isDefined(content[id])){
                return;
              }

              delete content[id];
              _setData(content);
              parent.unset(idx);
            },
            pile: function(chnl){

              var channel = [],
                data = {},
                stored = {},
                tube = this;

              return {
                /**
                * 	$rdks.pipe('clients').tube('address').pile('states').data();
                */
                data: function(){
                  if(tube.isset()){
                    stored = tube.get();
                    if(isDefined(stored[chnl])) channel = stored[chnl];

                    return channel;
                  }
                },
                count: function(){
                  return this.data().length;
                },
                /**
                * 	$rdks.pipe('clients').tube('address').pile('states').flush();
                */
                flush: function(){
                  if(tube.isset()){
                    var saved = rdksPipe(name).tube(id).get();
                    delete saved[chnl];

                    data[chnl] = [];
                    data = mergeData(saved, data);
                    tube.set(data);
                  }
                },
                /**
                * 	$rdks.pipe('clients').tube('address').pile('states').add({"name":"Texas"});
                */
                add: function(obj){

                  if(tube.isset()){
                    stored = tube.get();
                    if(isDefined(stored[chnl])) channel = stored[chnl];
                  }

                  var saved = rdksPipe(name).tube(id).get();
                  delete saved[chnl];

                    channel.push(obj);
                    data[chnl] = channel;
                    data = mergeData(saved, data);
                    tube.set(data);
                },
                /**
                *	$rdks.pipe('clients').tube('address').pile('states').get(0);
                */
                get: function(n){
                  if(tube.isset()){
                    stored = tube.get();
                    if(isDefined(stored[chnl])) channel = stored[chnl];

                    return (isDefined(channel[n])) ? channel[n] : null;
                  }
                },
                isset: function(n){
                  return (!isNull(this.get(n)));
                },
                /**
                *	$rdks.pipe('clients').tube('address').pile('states').unset(0);
                */
                unset: function(n){

                  if(!isNull(this.get(n))){

                    if(tube.isset()){
                      stored = tube.get();
                      if(isDefined(stored[chnl])) channel = stored[chnl];

                      var saved = rdksPipe(name).tube(id).get();
                      delete saved[chnl];

                      channel.splice(n, 1);
                      data[chnl] = channel;
                      data = mergeData(saved, data);
                      tube.set(data);
                    }

                  }
                },
                node: function(n){

                  var pile = this,
                    node = pile.get(n);

                  return {
                    /**
                    *	$rdks.pipe('clients').tube('address').pile('states').node(0).set({"name":"Georgia"});
                    */
                    set: function(obj){
                      if(!isNull(node)){

                        stored = tube.get();
                        if(isDefined(stored[chnl])) channel = stored[chnl];

                        var saved = rdksPipe(name).tube(id).get();
                        delete saved[chnl];

                        channel[n] = obj;
                        data[chnl] = channel;
                        data = mergeData(saved, data);
                        tube.set(data);

                      }
                    },
                    /**
                    *	$rdks.pipe('clients').tube('address').pile('states').node(0).update({"name":"California"});
                    */
                    update: function(obj){
                      if(!isNull(node)){

                        stored = tube.get();
                        if(isDefined(stored[chnl])) channel = stored[chnl];

                        var saved = rdksPipe(name).tube(id).get();
                        delete saved[chnl];

                        channel[n] = mergeData(channel[n], obj);
                        data[chnl] = channel;
                        data = mergeData(saved, data);
                        tube.set(data);

                      }
                    }
                  }
                }
              }
            }
      };
    }
  }
};
