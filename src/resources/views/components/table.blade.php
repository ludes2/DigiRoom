<div class="table-responsive-md mt-3">
    <table id="{{ $id }}" class="table table-hover table-sm shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th style="width: 3%"></th>
                {{ $thead }}
                <th style="width: 7%" class="text-center"></th>
            </tr>
        </thead>
    {{ $slot }}
    </table>
</div>