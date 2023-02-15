<?php

use Fen\Fenbooth\Models\Person;
use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Seed our example blog posts
        $firstPerson = $this->findPerson('John');
        if (!$firstPerson->exists) {
            $firstPerson->fill([
                'event_id' => null,
                'title' => 'First title',
                'firstname' => 'John',
                'lastname' => 'Doe',
                'designation' => 'Jr. Developer',
                'introduction' => '<p>Matey yardarm topmast broadside nipper weigh anchor jack quarterdeck crow\'s nest rigging. Topgallant lateen sail line avast me gun Pirate Round strike colors bilge rat take a caulk. Jack six pounders spanker doubloon clipper spirits case shot hang the jib boatswain red ensign.</p>
<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'status' => 'ACTIVE',
                'image' => 'person/default/img_avatar1.png',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'instagram' => '',
                'url' => '',
                'order' => 1,
            ])->save();
        }

        $secondPerson = $this->findPerson('Miller');
        if (!$secondPerson->exists) {
            $secondPerson->fill([
                'event_id' => null,
                'title' => 'Second title',
                'firstname' => 'Miller',
                'lastname' => 'Doe',
                'designation' => 'Sr. Developer',
                'introduction' => '<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'status' => 'INACTIVE',
                'image' => 'person/default/img_avatar1.png',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'instagram' => '',
                'url' => '',
                'order' => 1,
            ])->save();
        }

        $thirdPerson = $this->findPerson('Max');
        if (!$thirdPerson->exists) {
            $thirdPerson->fill([
                'event_id' => null,
                'title' => 'Second title',
                'firstname' => 'Max',
                'lastname' => 'Doe',
                'designation' => 'Sr. Java Developer',
                'introduction' => '<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'status' => 'ACTIVE',
                'image' => 'person/default/img_avatar1.png',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'instagram' => '',
                'url' => '',
                'order' => 1,
            ])->save();
        }

        $fourthPerson = $this->findPerson('Nancy');
        if (!$fourthPerson->exists) {
            $fourthPerson->fill([
                'event_id' => null,
                'title' => 'Second title',
                'firstname' => 'Nancy',
                'lastname' => 'Doe',
                'designation' => 'Sr. Java Developer',
                'introduction' => '<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'status' => 'ACTIVE',
                'image' => 'person/default/img_avatar5.png',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'instagram' => '',
                'url' => '',
                'order' => 1,
            ])->save();
        }

        $fifthPerson = $this->findPerson('June');
        if (!$fifthPerson->exists) {
            $fifthPerson->fill([
                'event_id' => null,
                'title' => 'Second title',
                'firstname' => 'June',
                'lastname' => 'Doe',
                'designation' => 'Sr. Java Developer',
                'introduction' => '<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'status' => 'ACTIVE',
                'image' => 'person/default/img_avatar5.png',
                'facebook' => '',
                'twitter' => '',
                'linkedin' => '',
                'instagram' => '',
                'url' => '',
                'order' => 1,
            ])->save();
        }

    }

    protected function findPerson($firstname)
    {
        return Person::firstOrNew(['firstname' => $firstname]);
    }
}
