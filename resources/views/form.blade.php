<div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
                @foreach($errors->get('nama') as $msg)
                    <p class="text-danger">{{$msg}}</p>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM Anda">
                @foreach($errors->get('npm') as $msg)
                    <p class="text-danger">{{$msg}}</p>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control">
                    @foreach ($kelas as $kelasItem)
                        <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                    @endforeach
                </select>
                @foreach($errors->get('kelas_id') as $msg)
                    <p class="text-danger">{{$msg}}</p>
                @endforeach
            </div>

            <input type="submit" class="btn btn-primary btn-submit" value="Submit">