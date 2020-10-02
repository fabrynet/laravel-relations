@extends('layouts.main-layout')

@section('content')

  <a href="{{ route('employees.index') }}">
    Index Employees
  </a>

  <h1>
    {{ $emp -> firstname}} {{ $emp -> lastname }}
  </h1>

  <ul>
    <li>
      <b>date of birth:</b> {{ $emp -> date_of_birth }}
    </li>
    <li>
      <b>private code:</b> {{ $emp -> private_code }}
    </li>
    <li>
      <b>location:</b> {{ $emp -> location -> name }} ({{ $emp -> location -> city }})
    </li>
  </ul>

  <h3>
    Tasks
  </h3>
  @if ($emp -> tasks -> isNotEmpty())
    <table>
      <thead>
        <th>
          task
        </th>
        <th>
          description
        </th>
        <th>
          start date
        </th>
        <th>
          end date
        </th>
      </thead>
      @foreach ($emp -> tasks as $tas)
        <tr>
          <td>
            {{ $tas -> name }}
          </td>
          <td>
            {{ $tas -> description }}
          </td>
          <td>
            {{ $tas -> start_date }}
          </td>
          <td>
            {{ $tas -> end_date }}
          </td>
        </tr>
      @endforeach
    </table>
  @else
    ---
  @endif

  <a href="{{ route('employees.edit', $emp -> id) }}">
    Edit Employee
  </a>

  <form action="{{ route('employees.destroy', $emp -> id) }}" method="post">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit" name="button">Delete Employee</button>
  </form>

@endsection
