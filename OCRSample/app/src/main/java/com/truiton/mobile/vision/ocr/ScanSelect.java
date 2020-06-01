package com.truiton.mobile.vision.ocr;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class ScanSelect extends AppCompatActivity {
    String username = "";
    String id = "";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_scan_select);
        Bundle bundle = getIntent().getExtras();
        if (bundle != null) {
            username = bundle.getString("username");
            id = bundle.getString("id");
        }
        findViewById(R.id.scanselectin).setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Bundle bundle1 = new Bundle();
                bundle1.putString("username",username);
                bundle1.putString("id",id);
                Intent intent = new Intent(ScanSelect.this,ScanIn.class);
                intent.putExtras(bundle1);
                startActivity(intent);
            }
        });

        findViewById(R.id.scanselectout).setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                Bundle bundle1 = new Bundle();
                bundle1.putString("username",username);
                bundle1.putString("id",id);
                Intent intent = new Intent(ScanSelect.this,ScanOut.class);
                intent.putExtras(bundle1);
                startActivity(intent);
            }
        });
    }
}
