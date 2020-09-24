string GS = Convert.ToString((char)29);
                    string ESC = Convert.ToString((char)27);
                    string COMMAND = "";
                    COMMAND = ESC + "@";
                    COMMAND += GS + "V" + (char)1;
                    RawPrinterHelper.SendStringToPrinter(pd.PrinterSettings.PrinterName, COMMAND);