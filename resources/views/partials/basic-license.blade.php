<table class="table table-bordered">
    <thead class="table-light ">
        <tr>
            <th colspan="3">
                BASIC LICENSE
            </th>
        </tr>
        <tr>
            <th>
                No.
            </th>
            <th>Category</th>
            <th>Card No.</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($submission->basicLicenses as $basicLicense)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $basicLicense->category }}
                </td>
                <td>
                    {{ $basicLicense->card_no }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    No data
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
