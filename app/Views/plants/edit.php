<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="px-10 pt-10">
    <div class=" max-h-screen flex flex-col gap-10">
        <h1 class="text-2xl md:text-4xl font-bold">Edit Plant Form</h1>
        <form method="POST" enctype="multipart/form-data" class="mb-3 flex gap-2 flex-col" action="/plant/update/<?= $plant['id'] ?>">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT"> <!-- untuk mengubah method post menjadi put -->
            <input type="hidden" name="id" value="<?= $plant['id'] ?>">
            <input type="hidden" name="gambarLama" value="<?= $plant['image'] ?>">
            <label class="form-control w-full">
                <div class="label  flex flex-col items-start">
                    <div class="label-text font-semibold text-lg">Nama Tanaman</div>
                    <?php if (isset($validation_errors['namaTanaman'])) : ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation_errors['namaTanaman'] ?></p>
                    <?php endif; ?>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full" name="namaTanaman" id="namaTanaman" value="<?= old('namaTanaman') ?? $plant['namaTanaman'] ?>">
            </label>
            <label class="form-control">
                <div class="label flex flex-col items-start">
                    <div class="label-text font-semibold text-lg">Deskrispsi</div>
                    <?php if (isset($validation_errors['deskripsi'])) : ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation_errors['deskripsi'] ?></p>
                    <?php endif; ?>
                </div>
                <textarea class="textarea textarea-bordered h-36" placeholder="Type here" name="deskripsi" id="deskripsi" value="<?= old('deskripsi') ?? $plant['deskripsi'] ?>"><?= old('deskripsi') ?? $plant['deskripsi'] ?></textarea>
            </label>
            <label class="form-control flex items-start">
                <div class="label flex flex-col items-start">
                    <div class="label-text font-semibold text-lg">Gambar</div>
                    <?php if (isset($validation_errors['gambar'])) : ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation_errors['gambar'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="flex flex-col md:flex-row gap-5 w-full">
                    <input type="file" class="file-input file-input-bordered w-full" id="gambar" name="gambar" value="<?= old('gambar') ?>">
                    <img alt="preview" class="img-preview h-36 w-36 object-cover object-center border border-gray-300 rounded-md" src="/img/plants/<?= $plant['image'] ?>">
                </div>
            </label>
            <div class="flex justify-start w-full">
                <button class="btn btn-primary font-semibold text-xl md:mt-0 mt-10 w-full md:w-24" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>