package com.example.fonta.piattaforma;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.drawable.BitmapDrawable;
import android.os.Bundle;
import android.os.Environment;
import android.provider.ContactsContract;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;

/**
 * Created by fonta on 21/04/2021.
 */

public class Certificato extends AppCompatActivity {

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.certificato);
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.itemHome:
                Intent openHomePage = new Intent(Certificato.this, Homepage.class);
                startActivity(openHomePage);
                break;


            case R.id.logoutItem:
                Intent openMainPage = new Intent(Certificato.this, MainActivity.class);
                startActivity(openMainPage);
                break;

            case R.id.itemVaccini:
                Intent openVacciniPage=new Intent (Certificato.this, Vaccini.class);
                startActivity(openVacciniPage);
                break;

            case R.id.itemFakeNews:
                Intent openFakeNewsPage=new Intent (Certificato.this, FakeNews.class);
                startActivity(openFakeNewsPage);
                break;

            case R.id.itemCampagna:
                Intent openCampagnaPage=new Intent (Certificato.this, Campagna.class);
                startActivity(openCampagnaPage);
                break;

            case R.id.questionarioItem:
                Intent openQuestionarioPage=new Intent (Certificato.this, Questionario.class);
                startActivity(openQuestionarioPage);
                break;


        }
        return super.onOptionsItemSelected(item);
    }

    public void backHomePage(View v)
    {
        Intent openHomePage=new Intent(Certificato.this,Homepage.class);
        startActivity(openHomePage);
    }
}
