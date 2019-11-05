<p>New exception for you:</p>
<p>{{ $exception->getMessage() }}</p>
@if(isset($backtrace))
    @if(count($backtrace))
        @php $log = $backtrace[0] @endphp
        <p>file: <br>  {{ isset($log['file']) ? $log['file'] : '' }}</p>
        <p>line: <br>  {{ isset($log['line']) ? $log['line'] : '' }}</p>
        <p>function: <br>  {{ isset($log['function']) ? $log['function'] : '' }}</p>
        <p>class: <br>  {{ isset($log['class']) ? $log['class'] : '' }}</p>
    @endif
@endif




