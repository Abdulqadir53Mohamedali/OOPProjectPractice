
function increment(){
    document.getElementById('increment-btn').addEventListener('click',function() {
        var input =document.getElementById('Quantity');
        var count = parseInt(input.value,10);
        input.value = count + 1;
    });
}

function decrement(){
    document.getElementById('decrement-btn').addEventListener('click',function() {
        var input =document.getElementById('Quantity');
        var count = parseInt(input.value,10);
        if (count > 0) {
            // Decrementing the current value by 1
            input.value = count - 1;
        }
    });
    
}

function QuantityCalculation(){
    decrement();
    increment();
}

QuantityCalculation();






