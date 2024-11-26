      <table class="table border">
          <thead class="table-light text-center">
              <tr>
                  <th>
                      No.
                  </th>
                  <th>Lion Air Aircraft Type
                  </th>

              </tr>
          </thead>
          <tbody>
              @forelse ($submission->lionAirAirCraftTypes as $lionAirAirCraftType)
                  <tr>
                      <td class="text-center">
                          {{ $loop->iteration }}
                      </td>
                      <td>
                          {{ $lionAirAirCraftType->air_craft_type }}
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="2" class="text-center">
                          No data
                      </td>
                  </tr>
              @endforelse
          </tbody>
      </table>
