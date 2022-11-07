// function to allow other function to 
// be called after certain period of time
// see:
// https://stackoverflow.com/a/57763036/12939325
function debounce(callback,wait){
    let timeout;
    return(...args)=>{
        clearTimeout(timeout);
        timeout = setTimeout(function(){callback.apply(this,args); }, wait);
    };
}