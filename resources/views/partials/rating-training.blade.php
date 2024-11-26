<table class="table border">
    <thead class="table-light ">
        <tr>
            <th colspan="3">
                Type of Rating Training
            </th>
        </tr>
        <tr class="text-center">
            <th>
                No.
            </th>
            <th>Course</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($submission->ratingTrainings as $ratingTraining)
            <tr>
                <td class="text-center">
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $ratingTraining->course }}
                </td>
                <td class="text-center">
                    {{ $ratingTraining->year }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
