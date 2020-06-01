package com.truiton.mobile.vision.ocr;


import android.Manifest;
import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.text.method.ScrollingMovementMethod;
import android.util.DisplayMetrics;
import android.util.Log;
import android.util.SparseArray;
import android.view.View;
import android.widget.CheckBox;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.vision.Frame;
import com.google.android.gms.vision.text.Text;
import com.google.android.gms.vision.text.TextBlock;
import com.google.android.gms.vision.text.TextRecognizer;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.List;

public class ScanIn extends AppCompatActivity {
    private static final int REQUEST_GALLERY = 0;
    private static final int REQUEST_CAMERA = 1;
    private static final int MY_PERMISSIONS_REQUESTS = 0;

    private static final String TAG = MainActivity.class.getSimpleName();

    private Uri imageUri;
    private TextView detectedTextView;
    //////
    int captureorder = 0;
    int thirdindex = 0;
    String companyname = "";
    String regno = "";
    String sealno = "";
    String trailerno = "";
    String isempty = "";
    public static String username = "";
    public static  String userid = "";
    public static boolean isscaninyes = false;
    public static boolean isscaninno = false;
    public static String containerno = "";
    public static String isocode = "";
    public static  String isbutton = "";
    int countsave = 0;
    /////
    @Override
    public void onRequestPermissionsResult(int requestCode,
                                           @NonNull String permissions[], @NonNull int[] grantResults) {
        switch (requestCode) {
            case MY_PERMISSIONS_REQUESTS: {
                if (grantResults.length > 0
                        && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                } else {
                    // FIXME: Handle this case the user denied to grant the permissions
                }
                break;
            }
            default:
                // TODO: Take care of this case later
                break;
        }
    }

    private void requestPermissions()
    {
        List<String> requiredPermissions = new ArrayList<>();

        if (ContextCompat.checkSelfPermission(this, Manifest.permission.WRITE_EXTERNAL_STORAGE)
                != PackageManager.PERMISSION_GRANTED) {
            requiredPermissions.add(Manifest.permission.WRITE_EXTERNAL_STORAGE);
        }

        if (ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA)
                != PackageManager.PERMISSION_GRANTED) {
            requiredPermissions.add(Manifest.permission.CAMERA);
        }

        if (!requiredPermissions.isEmpty()) {
            ActivityCompat.requestPermissions(this,
                    requiredPermissions.toArray(new String[]{}),
                    MY_PERMISSIONS_REQUESTS);
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_scan_in);
        Bundle bundle = getIntent().getExtras();
        if (bundle != null) {
            username = bundle.getString("username");
            userid = bundle.getString("id");
        }
        requestPermissions();
        detectedTextView = (TextView) findViewById(R.id.scaninscanresult);
        detectedTextView.setMovementMethod(new ScrollingMovementMethod());
        findViewById(R.id.scaninin).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                isscaninno = true;
                isscaninyes = true;
                thirdindex = 0;
                if (captureorder == 5){
                    countsave = 0;
                }else{
                    countsave = 1;
                }
                if ( captureorder >= 5 ){
                    Toast.makeText(getApplicationContext(), "overflowing capture", Toast.LENGTH_SHORT).show();
                    return;
                }
                Intent intent = new Intent();
                intent.setType("image/*");
                intent.setAction(Intent.ACTION_GET_CONTENT);
                startActivityForResult(intent, REQUEST_GALLERY);
            }
        });
        findViewById(R.id.scaninyes).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if ( isscaninyes ){
                    if ( countsave < 1 && captureorder == 5 ){
                        isbutton = "Y";
                        if ( ((CheckBox)findViewById(R.id.scaninloadstatus)).isChecked() ){
                            isempty = "Y";
                        }else{
                            isempty = "N";
                        }
                        ScanIn.SaveScan save = new ScanIn.SaveScan(userid,companyname,regno,trailerno,containerno,isocode,sealno,isempty,isbutton);
                        save.execute();
                        captureorder = 0;
                        thirdindex = 0;
                        detectedTextView.setText("");
                    }else{
                        Toast.makeText(getApplicationContext(), "don't saved.", Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast.makeText(getApplicationContext(), "no detector", Toast.LENGTH_SHORT).show();
                }
            }
        });
        findViewById(R.id.scaninno).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                detectedTextView.setText("");
                captureorder = 0;
                countsave = 0;
                thirdindex = 0;
            }
        });
    }

    private void inspectFromBitmap(Bitmap bitmap) {
        TextRecognizer textRecognizer = new TextRecognizer.Builder(this).build();
        try {
            if (!textRecognizer.isOperational()) {
                new AlertDialog.
                        Builder(this).
                        setMessage("Text recognizer could not be set up on your device").show();
                return;
            }
            captureorder++;
            Frame frame = new Frame.Builder().setBitmap(bitmap).build();
            SparseArray<TextBlock> origTextBlocks = textRecognizer.detect(frame);
            List<TextBlock> textBlocks = new ArrayList<>();
            for (int i = 0; i < origTextBlocks.size(); i++) {
                TextBlock textBlock = origTextBlocks.valueAt(i);
                textBlocks.add(textBlock);
            }
            Collections.sort(textBlocks, new Comparator<TextBlock>() {
                @Override
                public int compare(TextBlock o1, TextBlock o2) {
                    int diffOfTops = o1.getBoundingBox().top - o2.getBoundingBox().top;
                    int diffOfLefts = o1.getBoundingBox().left - o2.getBoundingBox().left;
                    if (diffOfTops != 0) {
                        return diffOfTops;
                    }
                    return diffOfLefts;
                }
            });
            String lines = "";
            StringBuilder detectedText = new StringBuilder();
            for (TextBlock textBlock : textBlocks) {
                if (textBlock != null && textBlock.getValue() != null) {
                    for (Text line : textBlock.getComponents()) {
                        thirdindex = thirdindex + 1;
                        //extract scanned text lines here
                        lines = lines + line.getValue() + "\n";
                        //Toast.makeText(this,line.getValue(),Toast.LENGTH_SHORT).show();
                        if ( captureorder == 1 ){
                            companyname = line.getValue();
                            detectedTextView.setText("companyname:" + companyname + "\n");
                            return;
                        }else if ( captureorder == 2 ){
                            regno = line.getValue();
                            detectedTextView.setText(detectedTextView.getText() + "\n" + "regno:" + regno + "\n");
                            return;
                        }else if ( captureorder == 3 ){
                            if ( thirdindex == 2 ){
                                isocode = line.getValue();
                                detectedTextView.setText(detectedTextView.getText() + "\n" + "isocode:" + isocode + "\n");
                                return;
                            }
                            if ( thirdindex == 1 ){
                                containerno = line.getValue();
                                detectedTextView.setText(detectedTextView.getText() + "\n" + "containerno:" + containerno + "\n");
                            }
                        }else if ( captureorder == 4 ){
                            sealno = line.getValue();
                            detectedTextView.setText(detectedTextView.getText() + "\n" + "sealno:" + sealno + "\n");
                            return;
                        }else if ( captureorder == 5 ){
                            trailerno = line.getValue();
                            detectedTextView.setText(detectedTextView.getText() + "\n" + "trailerno:" + trailerno + "\n");
                            return;
                        }
                    }
                    detectedText.append(textBlock.getValue());
                    detectedText.append("\n");
                }
            }
        }
        finally {
            textRecognizer.release();
        }
    }

    private void inspect(Uri uri) {
        InputStream is = null;
        Bitmap bitmap = null;
        try {
            is = getContentResolver().openInputStream(uri);
            BitmapFactory.Options options = new BitmapFactory.Options();
            options.inPreferredConfig = Bitmap.Config.ARGB_8888;
            options.inSampleSize = 2;
            options.inScreenDensity = DisplayMetrics.DENSITY_LOW;
            bitmap = BitmapFactory.decodeStream(is, null, options);
            inspectFromBitmap(bitmap);
        } catch (FileNotFoundException e) {
            Log.w(TAG, "Failed to find the file: " + uri, e);
        } finally {
            if (bitmap != null) {
                bitmap.recycle();
            }
            if (is != null) {
                try {
                    is.close();
                } catch (IOException e) {
                    Log.w(TAG, "Failed to close InputStream", e);
                }
            }
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        switch (requestCode) {
            case REQUEST_GALLERY:
                if (resultCode == RESULT_OK) {
                    inspect(data.getData());
                }
                break;
            case REQUEST_CAMERA:
                if (resultCode == RESULT_OK) {
                    if (imageUri != null) {
                        inspect(imageUri);
                    }
                }
                break;
            default:
                super.onActivityResult(requestCode, resultCode, data);
                break;
        }
    }

    /////////Save Scan data process
    class SaveScan extends AsyncTask<Void, Void, String> {
        String userid,companyname,regno,trailerno,containerno,isocode,sealno,isempty,isbutton,isscan;
        SaveScan(String userid,String companyname,String regno,String trailerno,String containerno,String isocode,String sealno,String isempty,String isbutton) {
            this.userid = userid;
            this.companyname = companyname;
            this.regno = regno;
            this.trailerno = trailerno;
            this.containerno = containerno;
            this.isocode = isocode;
            this.sealno = sealno;
            this.isempty = isempty;
            this.isbutton = isbutton;
            this.isscan = "IN";
        }
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }
        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);
            try {
                //converting response to json object
                JSONObject obj = new JSONObject(s);
                //if no error in response
                if (!obj.getBoolean("error")) {
                    Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        @Override
        protected String doInBackground(Void... voids) {
            //creating request handler object
            RequestHandler requestHandler = new RequestHandler();

            //creating request parameters
            HashMap<String, String> params = new HashMap<>();
            params.put("userid", userid);
            params.put("companyname", companyname);
            params.put("regno", regno);
            params.put("trailerno", trailerno);
            params.put("containerno", containerno);
            params.put("isocode", isocode);
            params.put("sealno", sealno);
            params.put("loadstatus", isempty);
            params.put("isscan",isscan);
            //returing the response
            String result = requestHandler.sendPostRequest(URLs.URL_SAVE, params);
            return result;
        }
    }
}
